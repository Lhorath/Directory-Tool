<?php
    // --- SEO & URL HELPER ---
    // This dynamically gets the current page's URL for canonical and social media tags.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
    $currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Project Hub | nerdygamertools.com</title>
    <meta name="description" content="A dynamic project hub showcasing web applications and utilities from nerdygamertools.com, generated automatically from project folders.">
    <meta name="keywords" content="PHP, project hub, portfolio, web development, web applications, utilities, nerdygamertools">
    <meta name="author" content="nerdygamertools.com">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($currentUrl); ?>" />

    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($currentUrl); ?>">
    <meta property="og:title" content="Project Hub - nerdygamertools.com">
    <meta property="og:description" content="A dynamic project hub showcasing web applications and utilities, generated automatically from project folders.">
    <meta property="og:image" content="https://dab.nerdygamertools.com/assets/og-image.png"> <!-- IMPORTANT: Replace with a real URL to a preview image (e.g., a screenshot of the page) -->

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($currentUrl); ?>">
    <meta name="twitter:title" content="Project Hub - nerdygamertools.com">
    <meta name="twitter:description" content="A dynamic project hub showcasing web applications and utilities, generated automatically from project folders.">
    <meta name="twitter:image" content="https://dab.nerdygamertools.com/assets/og-image.png"> <!-- IMPORTANT: Replace with a real URL to a preview image -->

    <!-- Theme Color for Browsers -->
    <meta name="theme-color" content="#ff003c">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts: Exo 2 for a futuristic feel -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body class="text-gray-200 flex flex-col min-h-screen">

    <div class="container mx-auto px-4 py-12 md:py-16 flex-grow">

        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white uppercase tracking-wider text-glow-red">Project Hub</h1>
            <p class="mt-3 text-lg text-gray-400 max-w-2xl mx-auto">A dynamic collection of web applications and utilities.</p>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
                // --- CONFIGURATION ---
                $projectsDirectory = './';
                define('BASE_URL', '');

                // --- SCRIPT LOGIC ---
                // Looks for a README.md in each project folder.
                // The README should contain metadata at the top, like this:
                // Icon: fa-rocket
                // Description: A description of the project.
                // GitHub: https://github.com/user/repo
                // Live: https://project.example.com
                if (is_dir($projectsDirectory)) {
                    $projectFolders = glob($projectsDirectory . '*', GLOB_ONLYDIR);

                    if (count($projectFolders) > 0) {
                        sort($projectFolders);

                        foreach ($projectFolders as $folder) {
                            $projectName = basename($folder);
                            $formattedProjectName = ucwords(str_replace('-', ' ', $projectName));
                            $projectUrl = BASE_URL . $folder;

                            // --- METADATA LOGIC FROM README.md ---
                            $projectIcon = 'fa-folder-open';
                            $projectDescription = 'No description provided. See README for details.';
                            $githubUrl = null;
                            $liveUrl = null;

                            $readme_path = $folder . '/README.md';
                            if (file_exists($readme_path)) {
                                $readme_content = file_get_contents($readme_path);

                                if (preg_match('/^Icon:\s*(.*)/m', $readme_content, $matches)) $projectIcon = trim($matches[1]);
                                if (preg_match('/^Description:\s*(.*)/m', $readme_content, $matches)) $projectDescription = trim($matches[1]);
                                if (preg_match('/^GitHub:\s*(.*)/m', $readme_content, $matches)) $githubUrl = trim($matches[1]);
                                if (preg_match('/^Live:\s*(.*)/m', $readme_content, $matches)) $liveUrl = trim($matches[1]);
                            }
            ?>

            <!-- Project Card -->
            <div class="bg-gray-900/60 backdrop-blur-md rounded-lg overflow-hidden flex flex-col card-glow">
                <div class="p-6 flex-grow flex flex-col">
                    <!-- Card Header -->
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-white">
                            <?php echo htmlspecialchars($formattedProjectName); ?>
                        </h3>
                        <div class="text-2xl text-primary-red">
                            <i class="fas <?php echo htmlspecialchars($projectIcon); ?>"></i>
                        </div>
                    </div>

                    <!-- Project Description -->
                    <p class="text-gray-400 text-sm flex-grow mb-6">
                        <?php echo htmlspecialchars($projectDescription); ?>
                    </p>

                    <!-- Action Buttons -->
                    <div class="mt-auto pt-4 border-t border-gray-800 flex items-center gap-3">
                        <?php if ($liveUrl): ?>
                            <a href="<?php echo htmlspecialchars($liveUrl); ?>"
                               class="flex-1 inline-flex items-center justify-center bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75 transition-all duration-300"
                               target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                <span>Live</span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo htmlspecialchars($projectUrl); ?>"
                               class="flex-1 inline-flex items-center justify-center bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75 transition-all duration-300"
                               target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-cogs mr-2"></i>
                                <span>Preview</span>
                            </a>
                        <?php endif; ?>

                        <?php if ($githubUrl): ?>
                        <a href="<?php echo htmlspecialchars($githubUrl); ?>"
                           class="inline-flex items-center justify-center text-gray-400 hover:text-white transition-colors duration-300"
                           target="_blank" rel="noopener noreferrer" title="View on GitHub">
                           <i class="fab fa-github fa-lg"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
                        } // end foreach
                    } else {
                        // Message if no project folders are found
                        echo '
                        <div class="col-span-1 md:col-span-2 lg:col-span-3">
                            <div class="bg-blue-900/60 backdrop-blur-md border border-blue-500 text-blue-200 p-6 rounded-lg text-center" role="alert">
                                <p class="font-bold text-lg">No Projects Found</p>
                                <p>Create a new folder in this directory to get started.</p>
                            </div>
                        </div>';
                    }
                } else {
                    // Error message if the main directory is missing
                    echo '
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="bg-red-900/60 backdrop-blur-md border border-red-500 text-red-200 p-6 rounded-lg text-center" role="alert">
                            <p class="font-bold text-lg">Directory Not Found</p>
                            <p>The required project directory could not be found: ' . htmlspecialchars($projectsDirectory) . '</p>
                        </div>
                    </div>';
                }
            ?>
        </div> <!-- /end grid -->

    </div> <!-- /end container -->

    <footer class="text-center py-5 text-gray-500 bg-black/30 border-t border-gray-800/50">
        &copy; <?php echo date("Y"); ?> nerdygamertools.com
    </footer>

</body>
</html>
