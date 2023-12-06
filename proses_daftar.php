<?php  
include 'connect/koneksi.php';

session_start();
	// Kondisi Session Sudah Login
 	if (isset($_SESSION['role'])) {
        header('location:dashboard.php');
    }

//dapatkan data user dari form register
$user = [
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'password' => $_POST['password'],
	'password_konfirmasi' => $_POST['password_konfirmasi'],
];

//validasi jika password & password_confirmation sama

if($user['password'] != $user['password_konfirmasi']){
	$_SESSION['error'] = 'Password Anda Tidak Sama.';
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['email'] = $_POST['email'];
	header("Location: daftar.php");
	return;
}

//check apakah user dengan username tersebut ada di table user
$query = "select * from user where username = ? limit 1";
$stmt = $con->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $user['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

//jika username sudah ada, maka return kembali ke halaman Daftar.
if($row != null){
	$_SESSION['error'] = 'Username Telah Digunakan.';
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['password_konfirmasi'] = $_POST['password_konfirmasi'];
	header("Location: daftar.php");
	return;

}else{
	//hash password
	$password = MD5($user['password']);
	$role = 'User';
	$created = time();
	$foto_default = 'user.png';

	//username unik. simpan di database.
	$query = "insert into user (username, email, password, role, created_on, foto) values (?,?,?,?,?,?)";
	$stmt = $con->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('ssssss', $user['username'], $user['email'], $password, $role, $created, $foto_default);
	$stmt->execute();
	$result = $stmt->get_result();
	var_dump($result);

	$_SESSION['message']  = 'Yeayy Anda Berhasil Daftar!';
	header("Location: masuk.php");
}

?>