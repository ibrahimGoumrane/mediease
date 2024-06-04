<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../media/css/build.css">

</head>
<body>
<div class="flex flex-col bg-gray-50 items-center justify-center h-screen">
      <h1 class="text-4xl font-bold mb-4">404 - Not Found</h1>
      <p class="text-gray-600">Sorry, the page you're looking for doesn't exist.</p>
      
      <div class="mt-6">
        <input
          type="text"
          placeholder="Search for content..."
          class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
          name="search"
          id="search"
        />
        </form>

      </div>
      
      <div class="mt-4 text-center ">
        <p class="text-gray-600 mb-3">Or, you might want to explore:</p>
        <div class=" flex items-center justify-center gap-5">
          <a href="./login.php" class="text-blue-500 hover:underline ml-2">Login in </a>
          <a href="./homePage.php" class="text-blue-500 hover:underline">Home</a>
          <a href="./blog.php" class="text-blue-500 hover:underline ml-2">Blog</a>
          <a href="./contactUs.php" class="text-blue-500 hover:underline ml-2">Contact</a>
        </div>
      </div>
    </div>
    <script>
      const search = document.getElementById('search');
      document.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
          window.location.href = `/mediease/main/build/view/${search.value}.php`;
        }
      });
    </script>
</body>
</html>
