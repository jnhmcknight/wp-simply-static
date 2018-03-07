<?php

namespace Simply_Static;
use \S3;

class Publish_To_S3_Task extends Task {

   /**
    * @var string
    */
   protected static $task_name = 'publish_to_s3';


   /**
    * Copy a batch of files from the temp dir to the destination dir
    * @return boolean true if done, false if not done
    */
   public function perform() {
      $aws_s3_bucket = $this->options->get( 'aws_s3_bucket' );
      $aws_access_key_id = $this->options->get( 'aws_access_key_id' );
      $aws_secret_access_key = $this->options->get( 'aws_secret_access_key' );

      list( $pages_processed, $total_pages ) = $this->publish_to_s3( $aws_s3_bucket, $aws_access_key_id, $aws_secret_access_key );

      if ( $pages_processed !== 0 ) {
         $message = sprintf( __( "Uploaded %d of %d files", 'simply-static' ), $pages_processed, $total_pages );
         $this->save_status_message( $message );
      }

      if ( $pages_processed >= $total_pages ) {
         if ( $this->options->get( 'destination_url_type' ) == 'absolute' ) {
            $destination_url = trailingslashit( $this->options->get_destination_url() );
            $message = __( 'Destination URL:', 'simply-static' ) . ' <a href="' . $destination_url .'" target="_blank">' . $destination_url . '</a>';
            $this->save_status_message( $message, 'destination_url' );
         }
      }

      // return true when done (no more pages)
      return $pages_processed >= $total_pages;

   }

   /**
   * Publish to AWS S3 Bucket
   * @param  string $aws_s3_bucket The name of the destination S3 bucket
   * @param  string $aws_access_key_id The AWS Access Key ID with permission to upload
   * @param  string $aws_secret_access_key The matching AWS Secret Access Key with permission to upload
   * @return array (# pages processed, # pages remaining)
   */
   public function publish_to_s3( $aws_s3_bucket, $aws_access_key_id, $aws_secret_access_key ) {
      $batch_size = 100;

      S3::$useExceptions = true;
      $s3 = new S3( $aws_access_key_id, $aws_secret_access_key );

      $archive_dir = $this->options->get_archive_dir();
      $archive_start_time = $this->options->get( 'archive_start_time' );

      // TODO: also check for recent modification time
      // last_modified_at > ? AND
      $static_pages = Page::query()
         ->where( "file_path IS NOT NULL" )
         ->where( "file_path != ''" )
         ->where( "( last_transferred_at < ? OR last_transferred_at IS NULL )", $archive_start_time )
         ->limit( $batch_size )
         ->find();
      $pages_remaining = count( $static_pages );
      $total_pages = Page::query()
         ->where( "file_path IS NOT NULL" )
         ->where( "file_path != ''" )
         ->count();
      $pages_processed = $total_pages - $pages_remaining;
      Util::debug_log( "Total pages: " . $total_pages . '; Pages remaining: ' . $pages_remaining );

      while ( $static_page = array_shift( $static_pages ) ) {
         try {
            $s3->putObject(
               S3::inputFile( $archive_dir . $static_page->file_path),
               $aws_s3_bucket,
               $static_page->file_path,
               S3::ACL_PUBLIC_READ );

         } catch (any $err) {
            Util::debug_log( "Cannot copy " . $origin_file_path .  " to s3://" . $aws_s3_bucket . $static_page->file_path );
            $static_page->set_error_message( 'Unable to copy file to destination: ' . $err );
         }

         $static_page->last_transferred_at = Util::formatted_datetime();
         $static_page->save();
      }

      return array( $pages_processed, $total_pages );
   }

}
