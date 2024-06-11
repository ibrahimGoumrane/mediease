<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../media/css/build.css">
</head>
<body class = "bg-gradient-to-t from-green-300 via-green-100 to-green-50 min-h-screen">
<?php include_once './components/header.php' ;?>
<main class="flex flex-col items-center min-h-screen text-center">

<h2 class=" capitalize text-2xl font-extrabold mb-5 text-center"> add Your availability Doc  : <?php echo $_SESSION['full_name'] ; ?> </h2>
<form class="w-1/4 mx-auto" action='../controller/handle_availability.php' method="POST">
    <div class=" mb-10 mt-10  flex flex-col justify-center align-center gap-5">
        <div>
            <label for="starting_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your Starting weekDay</label>
            <select id="starting_day" name="starting_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">Select a day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
        <div>
        <label for="ending_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your Ending weekDay</label>
        <select id="ending_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  name="ending_day"  required>
            <option value="">Select a day</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
        </div>
        <div>
            <label for="start_hour">Starting Hour:</label>
            <input type="time" id="start_hour" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="start_hour" min="09:00" max="12:00" value="00:00" required />
        </div>
        <div>
            <label for="end_hour">Ending Hour:</label>
            <input type="time" id="end_hour" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="end_hour" min="01:00" max="18:00" value="00:00" required />
        </div>
    </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submitAvai">Submit</button>
</form>
</main>
<?php include_once './components/footer.php' ?>
</body>
</html>