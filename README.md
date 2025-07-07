Icon: fa-rocket

Description: 
This is a single-file, zero-dependency PHP script that automatically generates a beautiful, modern, and responsive web page to showcase your projects. It works by simply scanning its own directory for project folders and pulling metadata directly from each project's README.md file.

GitHub: https://github.com/Lhorath/Directory-Tool/

Live: http://dab.nerdygamertools.com/

# Directory Tool
Dynamic PHP Project Hub 🚀

✨ Features
Fully Dynamic: No need to manually edit HTML. Just add a new project folder and it instantly appears on the page.

README-Driven: Pulls project titles, descriptions, icons, and links directly from each project's README.md file.

Modern Design: A sleek, futuristic red-and-black theme built with Tailwind CSS.

Responsive: Looks great on desktops, tablets, and mobile devices.

Zero Dependencies: Relies only on a standard PHP server and CDN links for styling and fonts. No composer or npm needed.

🔧 How It Works
The index.php script performs the following steps on each page load:

Scans Directories: It scans its current directory (./) for any subfolders. Each subfolder is treated as an individual project.

Finds README: Inside each project folder, it looks for a README.md file.

Parses Metadata: It reads the first few lines of the README.md file, looking for specific key-value pairs (Icon:, Description:, etc.).

Generates Cards: It dynamically generates a "project card" for each folder, populating it with the parsed metadata. If certain metadata is missing, it falls back to sensible defaults to prevent errors.
