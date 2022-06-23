<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
<style>
        h1 {
            font-family: 'Lobster Two', cursive;
        }
        
    </style>
</head>
<body class="bg-warning text-white">
	<div class="container w-100 text-center py-5">
		<h1 class="display-4 p-5">Lumpia Jesy</h1>
		<h1 class="display-3 p-6">403</h1>
		<h1 class="display-3 p-4">Kamu tidak dapat mengakses halaman ini</h1>
        <a href="<?=base_url();?>">Kembali ke Halaman Login</a>
	</div>
</body>
</html>