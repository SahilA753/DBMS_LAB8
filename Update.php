<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Information</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .wrapper {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        form span.error {
            color: #f00;
        }
        form input[type="submit"],
        form input[type="reset"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form input[type="submit"]:hover,
        form input[type="reset"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Update Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo "Input Name"; ?>">
                
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo "Input Email"; ?>">
              
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo "Input Phone No"; ?>">
               
            </div>
            <div>
                
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
