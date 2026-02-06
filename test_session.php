<?php
// Test session functionality
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Session Test</h1>
        
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5>Session Status Check</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        echo "<h6>Session Status:</h6>";
                        echo "<p><strong>Session ID:</strong> " . session_id() . "</p>";
                        echo "<p><strong>Session Status:</strong> ";
                        
                        switch(session_status()) {
                            case PHP_SESSION_DISABLED:
                                echo '<span class="badge badge-danger">Disabled</span>';
                                break;
                            case PHP_SESSION_NONE:
                                echo '<span class="badge badge-warning">None</span>';
                                break;
                            case PHP_SESSION_ACTIVE:
                                echo '<span class="badge badge-success">Active</span>';
                                break;
                        }
                        echo "</p>";
                        
                        if(isset($_SESSION['loggedin'])) {
                            echo "<p><strong>Login Status:</strong> ";
                            if($_SESSION['loggedin']) {
                                echo '<span class="badge badge-success">Logged In</span>';
                                echo "<br><strong>User ID:</strong> " . ($_SESSION['userId'] ?? 'Not Set');
                                echo "<br><strong>Username:</strong> " . ($_SESSION['username'] ?? 'Not Set');
                            } else {
                                echo '<span class="badge badge-warning">Not Logged In</span>';
                            }
                            echo "</p>";
                        } else {
                            echo "<p><strong>Login Status:</strong> <span class='badge badge-secondary'>No Login Data</span></p>";
                        }
                        ?>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Test Pages</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <a href="search.php?search=pizza" class="btn btn-primary btn-block">
                                    Test Search Page
                                </a>
                            </div>
                            <div class="col-md-4 mb-2">
                                <a href="about.php" class="btn btn-success btn-block">
                                    Test About Page
                                </a>
                            </div>
                            <div class="col-md-4 mb-2">
                                <a href="index.php" class="btn btn-info btn-block">
                                    Test Home Page
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Session Debug Info</h5>
                    </div>
                    <div class="card-body">
                        <h6>All Session Variables:</h6>
                        <pre class="bg-light p-3"><?php print_r($_SESSION); ?></pre>
                        
                        <h6>PHP Info:</h6>
                        <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
                        <p><strong>Session Save Path:</strong> <?php echo session_save_path(); ?></p>
                        <p><strong>Session Cookie Params:</strong></p>
                        <pre class="bg-light p-3"><?php print_r(session_get_cookie_params()); ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
