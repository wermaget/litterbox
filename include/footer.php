<!-- Footer -->
<footer class="">
    <div class="row" id="first-footer">
        <div class="container-fluid col-12 col-lg-3 footer-items logo-block">
            <img class="footer-logo" src="../include/assets/images/teamire-logo-light.png">
            <div class="about-teamire">
                <p>We transform the way candidates find jobs and companies hire talent.</p>
            </div>
        </div>
        <nav class="foot">
            <label for="drop2" class="toggle2">ABOUT
                US <b class="fa fa-chevron-right m-l-15 text-white"></b></label>
            <input type="checkbox" id="drop2"/>
            <ul class="menu1">
                <li>
                    <label for="drop-1" class="toggle2 footer-res"><a style="color: white;"
                                                                      href="../home/?view=aboutUs#howWeDoThis">How
                            We Do
                            This</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"> <a style="color: white;"
                                                                       href="../home/?view=aboutUs#ourVision">Our
                            Vision</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"> <a style="color: white;"
                                                                       href="../home/?view=downloads">Downloads</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;"
                                                                      href="../home/?view=aboutUs#ourObjectives">Our
                            Objectives</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;"
                                                                      href="../home/?view=logins">Timesheets</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle2 footer-res"><a style="color: white;"
                                                                      href="../home/?view=contactUs">Contact
                            Us</a></label>
                </li>
            </ul>
        </nav>
        <nav class="foot2">
            <label for="drop23" class="toggle23">RESOURCES <b
                    class="fa fa-chevron-right m-l-15 text-white"></b></label>
            <input type="checkbox" id="drop23"/>
            <ul class="menu23">
                <li>
                    <label for="drop-1" class="toggle23 footer-res" style="min-width: 1350px;"><a
                            style="color: white;"
                            href="../home/?view=services">Our
                            Services</a></label>
                </li>
                <li>
                    <label for="drop-2" class="toggle23 footer-res"><a class="text-white"
                                                                       href="../home/?view=projects">Projects</a></label>
                </li>
                <li>
                    <label for="drop-3" class="toggle23 footer-res"><a class="text-white"
                                                                       href="../home/?view=downloads">Downloads</a></label>
                </li>
            </ul>
        </nav>
        <nav class="foot3">
            <label for="drop24" class="toggle24">LEGAL <b
                    class="fa fa-chevron-right m-l-15 text-white"></b></label>
            <input type="checkbox" id="drop24"/>
            <ul class="menu24">
                <li>
                    <label for="drop-1" class="toggle24 text-white footer-res">Fraud
                        Alert</label>
                </li>
                <li>
                    <label for="drop-2" class="toggle24 text-white footer-res">Privacy
                        Policy</label>
                </li>
                <li>
                    <label for="drop-2" class="toggle24 text-white footer-res">Terms of
                        Use</label>
                </li>
                <li>
                    <label for="drop-2" class="toggle24 text-white">Government
                        Notice</label>
                </li>
            </ul>
        </nav>
        <div id="center_email">
            <center class="well">
                <div class="container" id="">
                    <h4 class="text-center text-white">Send us an email</h4>
                    <div class="row">
                        <form action="process.php?action=sendInquiry" method="POST"
                              data-parsley-validate="">
                            <div class="col-md-12">
                                <!-- Start Dropdown-->
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username"><span class="text-white">First Name </span><span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control font-13" style="height: 33px;"
                                               name="firstName" placeholder="First Name *" required>
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username"><span class="text-white">Last Name </span><span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control  font-13" style="height: 33px;"
                                               name="lastName" placeholder="Last Name *" required>
                                    </div>
                                </div>

                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="firstname"><span class="text-white">Our Services </span><span
                                                style="color: red;">*</span></label>
                                        <select class="form-control font-13" style="height: 33px;"
                                                name="jobFunctionId"
                                                required>
                                            <option>Our Services *</option>
                                            <?php include_once("../config/database.php"); ?>
                                            <?php $jfList = job_function()->list();?>
                                            <?php foreach ($jfList as $row) { ?>
                                                <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username"><span class="text-white">Business Email </span><span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control  font-13" style="height: 33px;"
                                               name="workEmail" placeholder="Business Email *" required>
                                    </div>
                                </div>

                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username"><span class="text-white">Business Phone </span><span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control  font-13" style="height: 33px;"
                                               name="phoneNumber" placeholder="Business Phone *"
                                               data-mask="(02) 9999-9999" required>
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username"><span class="text-white">Postal Code </span><span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control font-13" style="height: 33px;"
                                               name="zipCode" placeholder="Postal Code *" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username"><span class="text-white">Message </span><span
                                            style="color: red;">*</span></label>
                                    <textarea class="form-control font-13" name="message"
                                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                              data-parsley-validation-threshold="10" placeholder="Message *"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-9 email-info">
                                        <p class="font-13">This information will not be transferred, disclosed, or
                                            shared with a third party,
                                            or used for marketing purposes.</p>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <button type="submit" class="btn-sm btn-blue stepy-finish pull-right">
                                            SUBMIT
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <div class="container-fluid footer-updated" id="con">
        <div class="row center-page container">
            <div class="col-12 col-lg-3 footer-items logo-block">
                <img class="footer-logo" src="../include/assets/images/teamire-logo-light.png">
                <div class="about-teamire">
                    <p>We transform the way candidates find jobs and companies hire talent.</p>
                </div>
            </div>
            <div class="row col-12 col-lg-5 footer-items-container">
                <div class="container-fluid col-12 col-lg-4 footer-items">
                    <h4>ABOUT US</h4>
                    <ul>
                        <li><a style="color: white; padding:none;" href="../home/?view=aboutUs#howWeDoThis">How we do
                                this</a></li>
                        <li><a style="color: white;" href="../home/?view=aboutUs#ourVision">Our Vision</a></li>
                        <li><a style="color: white;" href="../home/?view=aboutUs#ourObjectives">Our Objectives</a></li>
                        <li><a style="color: white;" href="../home/?view=logins">Timesheets</a></li>
                        <li><a style="color: white;" href="../home/?view=contactUs">Contact Us</a></li>
                    </ul>
                </div>
                <div class="container-fluid col-12 col-lg-4 footer-items">
                    <h4>RESOURCES</h4>
                    <ul>
                        <li><a style="color: white;" href="../home/?view=services">Our Services</a></li>
                        <li><a style="color: white;" href="../home/?view=projects">Projects</a></li>
                        <li><a style="color: white;" href="../home/?view=downloads">Downloads</a></li>
                    </ul>
                </div>
                <div class="container-fluid col-12 col-lg-4 footer-items">
                    <h4>LEGAL</h4>
                    <ul>
                        <li>Fraud Alert</li>
                        <li>Privacy Policy</li>
                        <li>Terms of Use</li>
                        <li>Government Notice</li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid col-12 col-lg-4 email-block">
                <!-- <h4 class="text-white">FOLLOW US</h4>
                <i class="fa fa-facebook-square fa-2x"></i>&nbsp;&nbsp;<span>Facebook</span><br><br>
                <i class="fa fa-linkedin-square fa-2x"></i>&nbsp;&nbsp;<span>LinkedIn</span><br><br>
                <i class="fa fa-twitter-square fa-2x"></i>&nbsp;&nbsp;<span>Twitter</span><br><br>
                <i class="fa fa-youtube-square fa-2x"></i>&nbsp;&nbsp;<span>Youtube</span><br><br>
                <i class="fa fa-instagram fa-2x"></i>&nbsp;&nbsp;<span>Instagram</span> -->
                <h4 class="text-center form-title">Send us an email</h4>
                <div class="">
                    <form class="footer-form" id="default-wizard" action="process.php?action=sendInquiry" method="POST"
                          data-parsley-validate="">
                        <div class="row">
                            <!-- Start Dropdown-->
                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username"><span class="text-white">First Name </span><span
                                            style="color: red;">*</span></label>
                                    <input placeholder="First Name *" type="text" class="form-control font-13"
                                           style="height: 33px;" name="firstName" required>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username"><span class="text-white">Last Name </span><span
                                            style="color: red;">*</span></label>
                                    <input placeholder="Last Name *" type="text" class="form-control  font-13"
                                           style="height: 33px;" name="lastName" required>
                                </div>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="firstname"><span class="text-white">Our Services </span><span
                                            style="color: red;">*</span></label>
                                    <select class="form-control font-13" style="height: 33px;" name="jobFunctionId"
                                            required>
                                        <option>Our Services</option>
                                        <?php foreach ($jfList as $row) { ?>
                                            <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username"><span class="text-white">Business Email </span><span
                                            style="color: red;">*</span></label>
                                    <input placeholder="Business Email *" type="text" class="form-control  font-13"
                                           style="height: 33px;" name="workEmail" required>
                                </div>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username"><span class="text-white">Business Phone </span><span
                                            style="color: red;">*</span></label>
                                    <input placeholder="Business Phone *" type="text" class="form-control  font-13"
                                           style="height: 33px;" name="phoneNumber" data-mask="(02) 9999-9999" required>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username"><span class="text-white">Postal Code </span><span
                                            style="color: red;">*</span></label>
                                    <input placeholder="Postal Code *" type="text" class="form-control font-13"
                                           style="height: 33px;" name="zipCode" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username"><span class="text-white">Message </span><span style="color: red;">*</span></label>
                                <textarea placeholder="Message *" class="form-control font-13"
                                          name="message"
                                          data-parsley-trigger="keyup" data-parsley-minlength="20"
                                          data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                          data-parsley-validation-threshold="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <button type="submit" class="btn-sm stepy-finish pull-right submit-button"><span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-1"></div>
        </div>
    </div>
    <div class="copyright-footer">
        <div class="row container center-page">
            <span class="text-white">© 2018 Teamire. Catalyst for Continuous Improvement.</span>
        </div>
    </div>
</footer>