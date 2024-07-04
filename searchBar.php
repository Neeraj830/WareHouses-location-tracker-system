<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Search Bar</title>
    <style>
       
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:0;
        }
        .search-bar {
            padding: 10px 20px;
            width: 500px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease;
        }
        .search-bar:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .search-button {
            padding: 10px 20px;
            width: 100px;
            height: 50px;
            border: none;
            border-radius: 25px;
            margin-left: 10px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <button class="search-button">Search</button>
    </div>
</body>
</html>
