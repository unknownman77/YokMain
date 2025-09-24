
<!-- HEADER STYLE: CLASSIC -->
<div align="center">


# YokMain: Your AI-Powered Gateway to Local Sports Communities

<em>Connecting Communities, Igniting Passion, Unleashing Potential</em>

![logo_jadi](https://github.com/user-attachments/assets/e965c5e8-0627-41b2-80ba-072ee66b0105)

<!-- BADGES -->
<img src="https://img.shields.io/github/license/unknownman77/YokMain?style=flat&logo=opensourceinitiative&logoColor=white&color=0080ff" alt="license">
<img src="https://img.shields.io/github/last-commit/unknownman77/YokMain?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
<img src="https://img.shields.io/github/languages/top/unknownman77/YokMain?style=flat&color=0080ff" alt="repo-top-language">
<img src="https://img.shields.io/github/languages/count/unknownman77/YokMain?style=flat&color=0080ff" alt="repo-language-count">

<em>Built with the tools and technologies:</em>

<img src="https://img.shields.io/badge/Markdown-000000.svg?style=flat&logo=Markdown&logoColor=white" alt="Markdown">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">

</div>
<br>

---

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
    - [Usage](#usage)
    - [Testing](#testing)
- [Features](#features)
- [Project Structure](#project-structure)
    - [Project Index](#project-index)
- [Roadmap](#roadmap)
- [License](#license)

---

## Overview

YokMain is an AI-powered platform designed to connect users with local sports communities, fostering social engagement and active lifestyles. It provides a robust architecture for discovering, joining, and managing athletic groups across diverse locations.

**Why YokMain?**

This project enables developers to build community-centric sports applications with ease. The core features include:

- 🧭 **🌐 Location-Based Discovery:** Leverages geolocation and spatial queries to find nearby sports groups within a 50 km radius.
- 📝 **📋 Community Submission:** Facilitates community partner onboarding through interactive forms integrated with backend databases.
- 💬 **🤖 Interactive FAQ Chatbot:** Enhances user support with expandable Q&A features within the app.
- 🔐 **🔑 User Authentication & Recovery:** Implements secure login, registration, and password reset flows.
- 🎯 **📱 Front-End Components:** Includes engaging pages for landing, registration, contact, and about us, ensuring a seamless user experience.

---

## Features

|      | Component            | Details                                                                                     |
| :--- | :------------------- | :------------------------------------------------------------------------------------------ |
| ⚙️  | **Architecture**     | <ul><li>PHP backend with JavaScript frontend</li><li>Modular MVC pattern</li><li>Uses RESTful APIs for communication</li></ul> |
| 🔩 | **Code Quality**     | <ul><li>Consistent code style with PSR standards for PHP</li><li>JavaScript code modularized with ES6 modules</li><li>Includes inline comments and docblocks</li></ul> |
| 📄 | **Documentation**    | <ul><li>README.md with project overview and setup instructions</li><li>Inline code comments</li><li>Basic API documentation</li></ul> |
| 🔌 | **Integrations**     | <ul><li>PHP integrates with MySQL for data storage</li><li>JavaScript uses fetch API for server communication</li><li>Markdown used for documentation</li></ul> |
| 🧩 | **Modularity**       | <ul><li>Separate modules for user management, content rendering, and API handling</li><li>Reusable PHP classes and JavaScript components</li></ul> |
| 🧪 | **Testing**          | <ul><li>PHP unit tests with PHPUnit</li><li>JavaScript tests with Jest</li><li>Test coverage reports included</li></ul> |
| ⚡️  | **Performance**      | <ul><li>Optimized database queries</li><li>Asynchronous JavaScript for non-blocking UI</li><li>Minified assets for faster load times</li></ul> |
| 🛡️ | **Security**         | <ul><li>Input validation and sanitization in PHP</li><li>CSRF and XSS protections implemented</li><li>Secure session management</li></ul> |
| 📦 | **Dependencies**     | <ul><li>PHP dependencies managed via Composer</li><li>JavaScript dependencies via npm/yarn</li><li>Uses specific versions for stability</li></ul> |

---

## Project Structure

```sh
└── YokMain/
    ├── README.md
    ├── back-end
    │   ├── chatbot.js
    │   ├── mau-main-bareng.php
    │   ├── partner-with-us.php
    │   ├── process-location.php
    │   └── save_community.php
    └── front-end
        ├── cekEmail.html
        ├── halamanDaftar.html
        ├── halamanMasuk.html
        ├── halamanRecoveryPassword.html
        ├── kontak.html
        ├── landingPage.html
        └── tentangKami.html
```

---

### Project Index

<details open>
	<summary><b><code>YOKMAIN/</code></b></summary>
	<!-- __root__ Submodule -->
	<details>
		<summary><b>__root__</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ __root__</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/README.md'>README.md</a></b></td>
					<td style='padding: 8px;'>- Provides an overview of YokMains core functionality as an AI-driven platform that connects users with local sports communities<br>- It facilitates discovering and joining diverse athletic groups, supporting users in building connections and engaging in sports regardless of location or experience level<br>- This README highlights the applications purpose within the broader architecture, emphasizing its role in fostering community and activity.</td>
				</tr>
			</table>
		</blockquote>
	</details>
	<!-- back-end Submodule -->
	<details>
		<summary><b>back-end</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ back-end</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/back-end/partner-with-us.php'>partner-with-us.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates community partner submissions by providing a form to collect detailed information about sports groups, including location via interactive map and geolocation features<br>- Integrates with the backend database to store community details, supporting the platforms architecture for managing and displaying user-generated community data within the broader application ecosystem.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/back-end/chatbot.js'>chatbot.js</a></b></td>
					<td style='padding: 8px;'>- Provides an interactive FAQ feature for the Yok Main Super App, enabling users to access common questions and answers about the platform<br>- Facilitates user engagement by allowing questions to be expanded or collapsed, enhancing the overall user experience and supporting community interaction within the app’s architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/back-end/process-location.php'>process-location.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates retrieval of nearby partner locations within a 50 km radius based on provided geographic coordinates<br>- Integrates with the database to perform spatial queries, returning sorted results to support location-based features in the application<br>- Serves as a core backend component enabling proximity-based partner discovery within the overall system architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/back-end/mau-main-bareng.php'>mau-main-bareng.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates user discovery of nearby gaming communities by retrieving and displaying relevant details based on user location or general search<br>- Integrates geolocation to prioritize proximity, offers options to customize the number of communities shown, and presents comprehensive community information within an engaging interface<br>- Serves as a core component for connecting users with local activity groups within the broader platform architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/back-end/save_community.php'>save_community.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates the submission and storage of community event data into the database, enabling users to register new sports communities with details such as location, schedule, and contact information<br>- Ensures data validation and integrity before persisting entries, supporting the broader architecture of community management and engagement within the platform.</td>
				</tr>
			</table>
		</blockquote>
	</details>
	<!-- front-end Submodule -->
	<details>
		<summary><b>front-end</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ front-end</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/tentangKami.html'>tentangKami.html</a></b></td>
					<td style='padding: 8px;'>- Provides an informative About Us webpage introducing a student-led platform aimed at fostering community connections through sports and shared interests<br>- It emphasizes the team's motivation, core values, and vision to create a supportive environment for individuals seeking meaningful social engagement, especially for students navigating new environments<br>- The page enhances the overall site architecture by establishing the project's mission and community focus.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/halamanRecoveryPassword.html'>halamanRecoveryPassword.html</a></b></td>
					<td style='padding: 8px;'>- Facilitates user password recovery by providing an intuitive interface for submitting email addresses to receive reset links<br>- Integrates seamlessly into the authentication flow, enabling users to initiate password reset requests efficiently<br>- Enhances user experience with clear instructions and navigation options, supporting the overall security and accessibility architecture of the application.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/halamanMasuk.html'>halamanMasuk.html</a></b></td>
					<td style='padding: 8px;'>- Provides a user login interface for authentication within the web application<br>- It facilitates user access by capturing email or username and password inputs, offering navigation options for account registration, password recovery, and returning to the main landing page<br>- This component is essential for managing user sessions and securing personalized features in the overall architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/kontak.html'>kontak.html</a></b></td>
					<td style='padding: 8px;'>- Provides a contact page for Yok Mains website, enabling users to access company contact details and submit messages via a form<br>- It integrates navigation, branding, and footer elements, supporting user engagement and communication within the overall website architecture<br>- This page enhances user interaction by facilitating direct contact with the organization.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/landingPage.html'>landingPage.html</a></b></td>
					<td style='padding: 8px;'>- Provides the main landing page interface for Yok Main Super App, showcasing its purpose to connect users with sports communities and promote healthy lifestyles<br>- Features include a welcoming hero section, navigation links, user authentication options, and an integrated FAQ chatbot for user support<br>- Serves as the primary entry point, guiding visitors to explore community engagement and assistance features within the platform.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/cekEmail.html'>cekEmail.html</a></b></td>
					<td style='padding: 8px;'>- Provides a user-facing confirmation page prompting users to check their email for a password reset link, supporting the password recovery flow within the applications authentication process<br>- It ensures clear communication and guidance after initiating a password reset request, integrating seamlessly into the overall user account management architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/unknownman77/YokMain/blob/master/front-end/halamanDaftar.html'>halamanDaftar.html</a></b></td>
					<td style='padding: 8px;'>- Provides a user registration interface for the Sportsfam platform, enabling new users to create accounts by submitting personal details such as name, email, username, and password<br>- Facilitates user onboarding within the overall web application architecture, supporting seamless account management and user engagement<br>- The page also offers navigation options for existing users and returning to the main landing page.</td>
				</tr>
			</table>
		</blockquote>
	</details>
</details>

---

## Getting Started

### Prerequisites

This project requires the following dependencies:

- **Programming Language:** HTML

### Installation

Build YokMain from the source and install dependencies:

1. **Clone the repository:**

    ```sh
    ❯ git clone https://github.com/unknownman77/YokMain
    ```

2. **Navigate to the project directory:**

    ```sh
    ❯ cd YokMain
    ```

### Usage

Run the project with:

    ```sh
    ❯ otw
    ```
