<?php
	session_start();

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	} else {
		header('Location: login.php');
		exit();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['submit_mode'])) {
			$mode = $_POST['submit_mode'];

			$db_host = 'localhost';
			$db_user = 'root';
			$db_pass = '';
			$db_name = 'portfolio';

			$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if ($mode === 'submit_project') {
				$project_name = $_POST['project_name'];
				$project_description = $_POST['project_description'];

				$project_name = $conn->real_escape_string($project_name);
				$project_description = $conn->real_escape_string($project_description);

				$query = "INSERT INTO projects (username, project_name, project_description) VALUES ('$username', '$project_name', '$project_description')";

					if ($conn->query($query) === TRUE) {
						echo "<script>alert('Project data saved successfully!');</script>";
					} else {
						echo "<script>alert('Error!, Project data is unsaved?');</script>";
					}
			} elseif ($mode === 'delete_project') {
				$project_name_to_delete = $_POST['project_name'];

				$project_name_to_delete = $conn->real_escape_string($project_name_to_delete);

				$query = "DELETE FROM projects WHERE username='$username' AND project_name='$project_name_to_delete'";

				if ($conn->query($query) === TRUE) {
					echo "<script>alert('Project is deleted successfully!');</script>";
				} else {
					echo "<script>alert('Error!, There is not a Project in thats name.');</script>";
				}
			}
			$conn->close();
		}
	}
?>


<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title> My Profile </title>
	</head>
	<body>
		<section id="header">
			<div class="header container">
				<div class="nav-bar">
					<div class="brand">
						<a href="#hero"> <h1><span>D</span>AW <span>L</span>IMITED </h1></a>
					</div>
					<div class="nav-list">
						<div class="hamburger">
							<div class="bar">
							</div>
						</div>
						<ul>
							<li> <a href="#hero" data-after="Home"> Home </a> </li>
							<li> <a href="#services" data-after="Services"> Services </a> </li>
							<li> <a href="#projects" data-after="Projects"> Projects </a> </li>
							<li> <a href="#about" data-after="About"> About </a> </li>
							<li> <a href="#contact" data-after="Contact"> Contact </a> </li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="hero">
			<div class="hero container">
				<div>
					<h1> Hello, <span>  </span></h1>
					<h1> We are <span>  </span></h1>
					<h1> DAW LIMITED <span>  </span></h1>
					<a href="#projects" type="button" class="cta"> Potfolio </a>
				</div>
			</div>
		</section>
		<section>
			<div class="ls-btn">
				<div class="ls-text">More <span>C</span>reative With <span>U</span>s</div>
				<div class="button-container">
						<button id="btn-1">Logout</button>
						<script>
							document.getElementById('btn-1').addEventListener('click', function() {
							window.location.href = 'logout.php';
							});
						</script>
						<a href="logout.php"></a>
				</div>
			</div>
		</section>
		<section id="services">
			<div class="services container">
				<div class="service-top">
					<h1 class="section-title">Serv<span>i</span>ces</h1>
						<p style="font-size:15px";>
							Welcome to our website! We are a team of experts providing a range of services that can 
							help you achieve your personal and professional goals. Our programming expertise includes
							languages such as C, C++, Python, and JavaScript. We also provide game development 
							services using JavaScript, and stationery design services for all types of stationery, 
							including business cards, letterheads, envelopes, flyers, brochures, and more. In 
							addition, we offer web coding services, including expertise in HTML, CSS, and JavaScript. 
							Our team has extensive knowledge and experience in these areas, and we're dedicated to 
							providing high-quality and professional services to each of our clients. Whether you're 
							a small business owner or a large corporation, we're here to help you achieve success. 
							Contact us today to learn more about how we can help you with your projects and goals 
						</p>
				</div>
				<div>
					<div class="slider">
						<div class="slides-container">
							<div class="slide active">
								<img src="image1.jpg" alt="Image 1">
							</div>
							<div class="slide">
								<img src="image2.jpg" alt="Image 2">
							</div>
							<div class="slide">
								<img src="image3.jpg" alt="Image 3">
							</div>
							<div class="slide">
								<img src="image4.jpg" alt="Image 4">
							</div>
							<div class="slide">
								<img src="image5.jpg" alt="Image 5">
							</div>
						</div>
						<button class="prev">&lt; Previous</button>
						<button class="next">Next &gt;</button>
				</div>
				<div class="service-bottom">
					<div class="service-item">
						<div class="icon">
							<img src="service1.png">
						</div>
						<h2> Coding </h2>
						<p>
							One of the things we offer is programming expertise in languages like C, C++, and Python.
							When we say we have extensive knowledge of these coding languages, it means we have a 
							deep understanding of their syntax, structure, and functionalities. We can use this 
							expertise to write, debug, and optimize code for your software development projects. And 
							when we say we can provide this as a service, it means we can work with you to create 
							software solutions that meet your specific needs and requirements. So whether you're 
							looking to build a new program from scratch or improve an existing one, we have the skills and experience to help
						</p>
					</div>
					<div class="service-item">
						<div class="icon">
							<img src="service2.png">
						</div>
						<h2> Web Design </h2>
						<p>
							We specialize in web coding and have extensive knowledge of languages such as HTML, CSS, 
							and JavaScript. This means we have a deep understanding of how to design, build, and 
							optimize websites that are user-friendly, and visually appealing. Our team 
							can provide you with high-quality coding services that meet your specific needs, whether 
							you're looking to build a new website from redesign an existing one, or simply 
							improve its performance. With our expertise in web coding, we can help you create a 
							professional online presence that sets you apart from the competition. So if you're 
							looking for reliable and experienced web coders
						</p>
					</div>
					<div class="service-item">
						<div class="icon">
							<img src="service3.png">
						</div>
						<h2> Game Developing </h2>
						<p>
							If you're looking for someone to help you create an engaging and entertaining game, 
							you've come to the right place. We specialize in game development using JavaScript, a 
							versatile and powerful programming language that can be used to create games for web 
							browsers, mobile devices, and more. We use cutting-edge technology and industry best practices to ensure that your 							game is not 
							only fun and challenging but also stable, secure, and optimized for performance. So if 
							you're ready to take your game development to the next level, contact us today and let 
							us show you what we can do, we have the skills and experience to help
						</p>
					</div>
					<div class="service-item">
						<div class="icon">
							<img src="service4.png">
						</div>
						<h2> Documentation </h2>
						<p>
							If you're looking for high-quality and professional stationery design services, you've 
							come to the right place. Our team has extensive knowledge and experience in all types of 
							stationery design work, including business cards, flyers, brochures, and more. We use the latest design software 								and techniques to create custom 
							designs that are not only visually stunning but also effective in promoting your brand 
							and message. We work closely with our clients to ensure that their stationery designs. And with our commitment to 
							quality and customer satisfaction, you can be sure that you're getting the best possible 
							service.
						</p>
					</div>
				</div>
			</div>
		</section>
		<section id="projects">
			<div class="projects container">
				<div class="project-header">
					<h1 class="section-title">Recent <span>Projects</span></h1>
				</div>
				<div class="all-projects">
					<div class="project-item">
						<div class="project-info">
							<h1> Project 1 </h1>
							<h2> University Student Registration System </h2>
							<p>
								Our University Student Registration System is a C++ and OOP-based solution designed 
								to simplify the course registration process for students. The system is user-friendly,
								reliable, and secure, allowing students to browse available courses, view schedules, 
								and enroll in classes. With advanced security features and the latest programming 
								technologies, our system ensures that student information is kept safe and secure. 
								Overall, our system streamlines the registration process for students, making it 
								easier for them to manage their academic schedules and complete their degree 
								requirements
							</p>
						</div>
						<div class="project-img">
							<img src="project1.jpg" alt="img">
						</div>
					</div>
					<div class="project-item">
						<div class="project-info">
							<h1> Project 2 </h1>
							<h2> Hospital Database Management System </h2>
							<p>
								Our Hospital Database Management System is a MySQL and PHP-based solution designed 
								to manage patient information, medical records, and appointments. The system is 
								user-friendly, secure, and efficient, allowing hospitals to easily manage patient 
								data and appointment schedules. With advanced security features and the latest 
								programming technologies, our system ensures that patient information is kept safe 
								and secure. Overall, our system streamlines the management of patient information 
								and appointments, making it easier for hospitals to provide better patient care
							</p>
						</div>
						<div class="project-img">
							<img src="project2.jpg" alt="img">
						</div>
					</div>
					<div class="project-item">
						<div class="project-info">
							<h1> Project 3 </h1>
							<h2> Web Page Designing </h2>
							<p>
								My personal profile web page is built using HTML, CSS, and JavaScript to showcase my 
								skills, experience, and interests. It features information about my educational 
								background, work experience, and skills, along with links to my social media profiles 
								and contact information. With a clean and modern design, the web page is visually 
								appealing and user-friendly, including responsive design and interactive features. 
								Overall, it provides a professional and engaging overview of my background and 
								skills
							</p>
						</div>
						<div class="project-img">
							<img src="project3.jpg" alt="img">
						</div>
					</div>
					<div class="project-item">
						<div class="project-info">
							<h1> Project 4 </h1>
							<h2> Mini Game Designing </h2>
							<p>
								My mini-game web page is created using JavaScript, HTML, and CSS, providing users 
								with an entertaining and challenging experience. The game consists of multiple 
								levels, with varying challenges and requires quick reflexes and problem-solving 
								skills to complete. The visually appealing game is accessible to all users, providing 
								hours of entertainment and fun challenges
							</p>
						</div>
						<div class="project-img">
							<img src="project4.jpg" alt="img">
						</div>
					</div>
					<div class="project-item">
						<div class="project-info">
							<h1> Project 5 </h1>
							<h2> Group Works </h2>
							<p>
								Our group's website showcases our team's expertise in web development, software 
								engineering, and graphic design. We provide customized IT solutions that meet our 
								clients' specific needs and pride ourselves on our professionalism and quality work. 
								From small businesses to large corporations, we have the skills and knowledge to help 
								clients achieve their goals. Thank you for considering our team for your IT needs
							</p>
						</div>
						<div class="project-img">
							<img src="project5.jpg" alt="img">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="about">
			<div class="about container">
				<div class="col-left">
					<div class="about-img">
						<img src="me.jpg" alt="img">
					</div>
				</div>
				<div class="col-right">
					<h1 class="section-title"> About <span> ME </span> </h1>
					<h2> Undergraduate Student of University of Rajarata </h2>
					<div class="additional-info">
						<p style="font-size:20px";>Additional Information</p>
						<p style="font-size:15px";>
							Hi, I'm DAW ICT123, an undergraduate student studying IT. I'm passionate about technology and 
							excited to be pursuing a career in this field. During my studies, I've learned about 
							programming, networking, cybersecurity, and database management. I'm particularly interested 
							in coding. Thanks for visiting my page!
						</p>
					</div>
						<button class="toggle-button"> Additional  Details </button>
					<div>
						<a href="Used Document.pdf" target=" " class="toggle-button"> Download Resume </a>
					</div>
				</div>
			</div>
		</setion>
		<section id="contact-form">
			<form action="welcome.php" method="post">
				<h1> YOU <span style="color:#FF4F00;">CAN</span> JOIN WITH <span style="color:#FF4F00;">US</span></h1>
				<h2> CREATE YOUR <span style="color:#FF4F00;">OWN</span> PROJECTS</h2><br>
				<input type="radio" name="submit_mode" value="submit_project" required> Submit Project Data&nbsp;&nbsp;&nbsp;
				<input type="radio" name="submit_mode" value="delete_project" required> Delete Project<br>
				<hr style="height:2px; background-color:#ffffff; width: 100%;"><br>
				<input type="text" name="project_name" placeholder="Subject of Required Project" required>
				<label for="project_description">Project Description:</label>
				<textarea name="project_description" rows="4" cols="80" required></textarea><br>
				<button type="submit" name="formSubmit">Submit Project Data</button>
			</form>
		</section>
		<section id="contact">
			<div class="contact container">
				<div>
					<h1 class="section-title">Contact<span> info</span></h1>
				</div>
				<div class="contact-items">
					<div class="contact-item">
						<div class="icon">
							<img src="phone.png">
						</div>
						<div class="contact-info">
							<h1> Phone </h1>
							<h2> +94 771 234 567 </h2>
							<h2> +94 111 234 567 </h2>
						</div>
					</div>
					<div class="contact-item">
						<div class="icon">
							<img src="address.png">
						</div>
						<div class="contact-info">
							<h1> Email </h1>
							<h2> websolution@gmail.com </h2>
							<h2> crazygammer@gmail.com </h2>
						</div>
					</div>
					<div class="contact-item">
						<div class="icon">
							<img src="location.png">
						</div>
						<div class="contact-info">
							<h1> Address </h1>
							<h2> RJARATA University, </h2>
							<h2> Mihinthale, </h2>
							<h2> Sri Lanka. </h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="footer">
			<div class="footer container">
				<div class="brand">
					<h1><span>D</span>AW<span> I</span>CT123</h1>
				</div>
				<h2>Your Complete Web Solution</h2>
				<div class="social-icon">
					<div class="social-item">
						<a href="https://en.wikipedia.org/wiki/WhatsApp"><img src="social1.png"></a>
					</div>
					<div class="social-item">
						<a href="https://en.wikipedia.org/wiki/YouTube"><img src="social2.png"></a>
					</div>
					<div class="social-item">
						<a href="https://en.wikipedia.org/wiki/Instagram"><img src="social3.png"></a>
					</div>
					<div class="social-item">
						<a href="https://en.wikipedia.org/wiki/Facebook"><img src="social4.png"></a>
					</div>
				</div>
				<p>
					Copyright © 2023 DAW (PVT) LIMITED. All rights reserved
				</p>
			</div>
		</section>
		<script type="text/JavaScript"src="app.js"></script>	
	</body>
</html>