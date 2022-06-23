<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="in">
  <head>
    <meta charset="UTF-8">
    
    <title>Dashboard - Customer Database</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    <style>
      

        .delete{
            background-color:red;
            color:white;
            border:2px red solid;
          }

          .delete:hover{
            background-color:white;
            color:red;
            border:2px red solid;
          }
        .remove{
            background-color:red;
            color:white;
            border:2px red solid;
          }
          
          .remove:hover{
            background-color:white;
            color:red;
            border:2px red solid;
          }
          .moda1 {
            position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255,255,255,0.5);
        opacity: 1;
        visibility: hidden;
        transform: scale(0.5);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
      }

      .moda1-content {
        opacity: 1;
        z-index: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #eee;
        padding: 1rem 1.5rem;
        width: 70%;
        border-radius: 0.5rem;
      }
        .close-button {
          float: right;
          width: 25px;
          height: 25px;
          text-align: center;
          cursor: pointer;
            border-radius:15px;
            background-color: red;
        }
        .close-button:hover {
            background-color: #eee;
        }
          
        .show-moda1 {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
      }
      .close-moda1 {
        opacity: 0;
        visibility: hidden;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
      }
      
      .trigger{
        width: 40%;
      }
      .button{
        width: 40%;
      }

      .edit-button{
        background-color: green;
      color: white;
      border: 3px solid green;
    }
    .edit-button:hover{
      background-color: white;
      color: green;
      border: 3px solid green;
    }

    .form-category{
      visibility: hidden;
      height: 0;
      width: 0;
    }

    .show-category-form{
      visibility: visible;
      height: auto;
      width: auto;
    }

    .kategori-dropdown{
      max-height: 100px;
      overflow: auto;
    }
    
    .jumlah{
      min-width: 50px;
      max-width: 50px;
    }
    
    .price-container{
      width: 70%;
      display: block;
    }
    
    .sub{
      font-weight: bolder;
      font-size: 20px;
    }

    .subtotal{
      float: right;
    }
    .sum{
      font-weight: bolder;
      font-size: 30px;
    }

    .total{
      float: right;
    }
    
    .display-6{
      font-family: 'Lobster Two', cursive;
    }

    
  .material-symbols-outlined {
    vertical-align: middle;
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 48
  }
</style>

    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    
    <body>
      <nav class="navbar navbar-expand-lg bg-warning pb-4">
  <div class="container-fluid bg-warning">
    <a class="display-6 bg-warning text-white text-decoration-none">Lumpia Jesy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse m-3" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item m-2">
          <a class="nav-link active" aria-current="page" href="<?= base_url('Control');?>">List Pelanggan</a>
        </li>
        <li class="nav-item m-2">
          <a class="nav-link active" href="<?= base_url('Menu')?>" >List Menu</a>
        </li>
        <li class="nav-item m-2">
          <a class="nav-link active" href="<?= base_url('Order')?>" >List Orderan</a>
        </li>
        <li class="nav-item m-2">
          <a class="nav-link active"href="#" >Kalkulator</a>
        </li>
        <li class="nav-item m-2">
          <a class="nav-link active" href="<?= base_url()?>" >Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
      
        

</div>
<br>
<br>
