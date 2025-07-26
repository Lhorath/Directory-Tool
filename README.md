Icon: fa-rocket

Description: A single-file PHP script that dynamically generates a project showcase by scanning directories and parsing README.md files.

GitHub: https://github.com/Lhorath/Directory-Tool/

Live: http://projects.nerdygamertools.com/

# Directory Tool: A Dynamic PHP Project Hub

This is a single-file, zero-dependency PHP script that automatically generates a beautiful, modern, and responsive web page to showcase your projects. It works by simply scanning its own directory for project folders and pulling metadata directly from each project's `README.md` file.

---

## ✨ Features

* **Fully Dynamic:** No need to manually edit HTML. Just add a new project folder and it instantly appears on the page.
* **README-Driven:** Pulls project titles, descriptions, icons, and links directly from each project's `README.md` file.
* **Modern Design:** A sleek, futuristic red-and-black theme built with Tailwind CSS.
* **Responsive:** Looks great on desktops, tablets, and mobile devices.
* **Zero Dependencies:** Relies only on a standard PHP server and CDN links for styling and fonts. No `composer` or `npm` needed.

---

## 🔧 How It Works

The `index.php` script performs the following steps on each page load:

1.  **Scans Directories:** It scans its current directory (`./`) for any subfolders. Each subfolder is treated as an individual project.
2.  **Finds README:** Inside each project folder, it looks for a `README.md` file.
3.  **Parses Metadata:** It reads the first few lines of the `README.md` file, looking for specific key-value pairs (`Icon:`, `Description:`, etc.).
4.  **Generates Cards:** It dynamically generates a "project card" for each folder, populating it with the parsed metadata. If certain metadata is missing, it falls back to sensible defaults to prevent errors.

---

## 🚀 Setup and Usage

1.  **Server:** Place the `index.php` file on a PHP-enabled web server.
2.  **Project Folders:** Create a sub-folder for each project you want to display.
3.  **Add READMEs:** Inside each project folder, create a `README.md` file with the metadata block at the very top.

### Metadata Format

The script requires the following format at the top of each project's `README.md`:

```markdown
Icon: fa-gamepad
Description: A short, one-line description for the project card.
GitHub: [https://github.com/your-username/your-repo](https://github.com/your-username/your-repo)
Live: [https://your-project-live-url.com](https://your-project-live-url.com)

# Your Project's Full Title
(The rest of your documentation goes here...)
