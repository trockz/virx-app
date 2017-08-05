


<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Users Management</title>
    <base href="/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <script type="text/javascript" src="./assets/js/main.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Application Form</h1>
    </div>
</div>

<div class="container">
    <div class="row">
    
        <div class="col-md-12">
        
            <table  id="user-list" class="table table-stripped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

    </div>
</div>



<fieldset>
        <div class="form-top">
            <div class="form-top-left">
                <h3><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>Users</h3>
                <p>User Result
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <h3><b>Firstname</b></h3>
                    <b id="xfirstname"></b>
            </div>
            <div class="col-md-4">
                <h3><b>Last name</b></h3>
                    <b id="xlastname"></b>
            </div>
            <div class="col-md-4">
                <h3><b>Age</b></h3>
                    <b id="xage"></b>
            </div>
            <div class="col-md-12">
                <h3><b>Expenses Comparison</b></h3>
                <div id="expcom">
                </div>
            </div>
        </div>
    </fieldset>

<script>

    getUsers();
$("#user-list").on('click', ".view", function () {
    getUser($(this).data("id"));
});
</script>

</body>
</html>