<?php
   $dbhost = $_POST['host'];
   $dbuser = $_POST['user'];
   $dbpass = $_POST['pass'];
   $dbase  = $_POST['dbname']; 
   $pilihan  = $_POST['pilih'];
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Tidak bisa melakukan koneksi: ' . mysql_error());
   }
   $table_name = $_POST['table'];
   $backup_file = $_POST['filename'].'.sql';
   
   function backupDB(){
      $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
      
      mysql_select_db('$dbase');
      $retval = mysql_query( $sql, $conn );
      
      if(! $retval ) {
         die('Gagal mengambil data untuk di backup: ' . mysql_error());
      }
      
      echo "Data sukses di backup\n";
      
      mysql_close($conn);
   };

   function restoreDB(){
      $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";
      
      mysql_select_db('$dbase');
      $retval = mysql_query( $sql, $conn );
      
      if(! $retval ) {
         die('Tidak bisa load data : ' . mysql_error());
      }
      echo "Data berhasil di restore\n";
      
      mysql_close($conn);
   };

   switch ($pilihan) {
       case 'backup':
           backupDB();
           break;
       case 'restore':
           restoreDB();
           break;
       default:
           echo "Maaf Anda tidak memilih ingin melakukan Backup / Restore";
   }
   
?>