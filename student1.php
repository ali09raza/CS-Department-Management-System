<!DOCTYPE html>
<html>
<head>
	<title>Student Records Management System</title>
	<style>
		
		body {
			background: linear-gradient(to bottom, #010230 ,blueviolet );
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		header {
			background-color: #007ACC;
			color: white;
			padding: 20px;
			text-align: center;
		}

		h1 {
			margin: 0;
			font-size: 36px;
		}

		nav {
			background-color: #E1E1E1;
			padding: 10px;
		}

		nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
			text-align: center;
		}

		nav li {
			display: inline-block;
			margin: 0 10px;
		}

		nav a {
			color: #007ACC;
			text-decoration: none;
			font-size: 20px;
			padding: 5px;
			border-radius: 5px;
			transition: all 0.3s ease;
		}

		nav a:hover {
			background-color: #007ACC;
			color: white;
		}

		main {
			padding: 20px;
			text-align: center;
			flex: 1 0 auto;
		}

		footer {
			background-color: #007ACC;
			color: white;
			text-align: center;
			margin-top: auto;
		}

		button {
			background-color: #007ACC;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 10px;
			transition: all 0.3s ease;
		}

		button:hover {
			background-color: white;
			color: #007ACC;
			border: 2px solid #007ACC;
		}
	</style>
</head>
<body>
	<header>
		<h1>Student Records Management System</h1>
		<nav>
			<ul>
				<li><a href="project1.php">Home</a></li>
				<li><a href="student1.php">Students</a></li>
				<li><a href="faculty.php">Faculty</a></li>
				<li><a href="#">Time Table</a></li>
				
			</ul>
		</nav>
	</header>
	<main>
		<h2>Welcome to Student Records Management System</h2>
		<p>This system provides a centralized platform for managing various aspects of student records.</p>
		<button onclick="window.open('search.php', '_blank')">View Record</button>
		<button onclick="window.open('Student_form.php', '_blank')">Add Record</button>
	</main>
	<footer>
		<p>Developed By Ali Raza</p>
	</footer>
</body>
</html>

<script>
	
</script>