<div class="container nav-wrapper">
    <div class="logo-wrapper">
        <a href="../index.php" class="logo logo-mobile">
            <img class="logo-light" src="../include/assets/images/teamire-logo-light-min.png">
            <img class="logo-dark" src="../include/assets/images/teamire-logo-min.png">
        </a>
    </div>
    <nav>
        <label for="drop" class="toggle"><i class="fa fa-bars"></i></label>
        <input type="checkbox" id="drop"/>
        <div class="menu-wrapper">
            <ul class="menu">
                <li class="home-button"><a href="../home">Home</a></li>
                <li>
                    <a href="#" class="nav-item-drop">Job Seekers</a>
                    <input type="checkbox" id="drop-2"/>
                    <ul class="nav-level2">
                        <li><a href="../home/?view=searchJob">Search Job</a></li>
                        <li><a href="../home/?view=submitResume">Submit Resume</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-item-drop">Employers</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul class="nav-level2">
                        <?php if (isset($_SESSION['company_session'])): ?>
                            <li><a href="../company">Dashboard</a></li>
                        <?php else: ?>
                            <li><a href="../company">Employer Login</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['company_session'])): ?>
                            <li><a href="../home/?view=hiringForm">Request Talent</a></li>
                        <?php endif; ?>
                        <li><a href="../home/?view=searchResume">Find Candidates</a></li>
                        <?php if (!isset($_SESSION['company_session'])): ?>
                            <li><a href="../home/?view=clientForm">Employer Registration</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['company_session'])): ?>
                            <li><a href="../company/process.php?action=logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-item-drop">Work With Us</a>
                    <input type="checkbox" id="drop-3"/>
                    <ul class="nav-level2">
                        <li><a href="../home/?view=services">Our Services</a></li>
                        <li><a href="../home/?view=aboutUs">About Us</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="nav-item-drop">Blog</a>
                    <input type="checkbox" id="drop-4"/>
                    <ul class="nav-level2">
                        <li><a class="m-l-3 m-r-3" href="../home/?view=projects">Supply Chain Projects</a></li>
                        <li><a class="m-l-3 m-r-3" href="../home/?view=remoteTeam">Remote Team</a></li>
                    </ul>
                </li>
                <li><a class="toggle-class" href="../community">Community</a></li>
                <li><a class="m-l-3 m-r-3 toggle-class" href="../home/?view=logins">Timesheets</a></li>
                <li><a class="m-l-3 m-r-3 toggle-class" href="../home/?view=contactUs">Contact</a></li>
            </ul>
        </div>
    </nav>
</div>
