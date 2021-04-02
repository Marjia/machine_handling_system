<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine Handling System</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 55%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">MACHINE HANDLING SYSTEM</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Mirpur DOHS</p>
                        <p class="text-white">11 Avenue</p>
                        <p class="text-white">+91 88855509876</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div >
                <div>
                    <h2 class="heading">Invoice No.: 00{{$invoice->id}}</h2>
                    <p class="sub-heading">Tracking No. 00{{$invoice->id}} </p>
                    <p class="sub-heading">Order Date: {{$invoice->created_at}} </p>
                    <p class="sub-heading">Email Address: {{$users->find($usersession->taggedUsersMachines()->first()->user_id)->email}} </p>
                </div>
                <div >
                    <p class="sub-heading">Full Name: {{$users->find($usersession->taggedUsersMachines()->first()->user_id)->first_name}} {{$users->find($usersession->taggedUsersMachines()->first()->user_id)->last_name}} </p>
                    <p class="sub-heading">Address: {{$users->find($usersession->taggedUsersMachines()->first()->user_id)->company_name}} </p>
                    <p class="sub-heading">Phone Number: {{$users->find($usersession->taggedUsersMachines()->first()->user_id)->phone_number}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Tagged Machine</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Machine No.</th>
                        <th class="w-20">Session Rate</th>
                        <th class="w-20">Discount</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$machine->find($usersession->taggedUsersMachines()->first()->machine_id)->machine_no}}</td>
                        <td>{{$tag->find($usersession->taggedUsersMachines()->first()->id)->hourly_session_charge}}</td>
                        <td>{{$invoice->discount}}%</td>
                        <td>{{$invoice->final_amount}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td> 10.XX</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Tax Total %1X</td>
                        <td> 2</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td> {{$invoice->total_payable_amount}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Machine Handling System.All rights reserved. 
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>      
    </div>      

</body>
</html>