<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Bay - Search</title>
    <link href="output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4 font-['Inter']">
    <div class="w-full max-w-2xl text-center">
        <h1 class="text-4xl font-semibold text-gray-800 mb-8">Secure Bay</h1>
        <form action="search.php" method="GET" class="flex flex-col items-center w-full max-w-md mx-auto space-y-4">
            <input 
                type="text" 
                name="q" 
                placeholder="Search..." 
                required
                class="w-full px-6 py-3 text-gray-700 bg-white border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
            >
            <button 
                type="submit" 
                class="w-full sm:w-auto px-8 py-3 bg-blue-600 text-white font-medium rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 whitespace-nowrap"
            >
                Search
            </button>
        </form>
    </div>
</body>
</html>