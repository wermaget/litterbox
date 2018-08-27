<?php
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id)
{
    $job = position_type()->get("Id='$Id'");
    echo $job->option;
}

?>

<div class="container about-us">
    <div class="block intro">
        <div class="content">
            <h2 class="title">About Us</h2>
        </div>
    </div>
</div>
<div class="container-fluid m-b-30">

    <!-- Start About Us Content -->
    <div class="center-page container-80">
        <div class="row slideanim">
            <div class="col-md-12 slideleft">
                <h4>About Us</h4>
                <div>
                    <p>Teamire (Aust) Pty Ltd is a consulting business in Supply Chain Management specializing in
                        Synchronization
                        of business activities. In early 2017 Teamire was established by Simon Reddy, founder and CEO as
                        a “go to”
                        knowledge box for SME’s struggling that is unable to afford full time employees. demands and
                        challenges
                    </p>
                </div>
                <div id="more">
                    <p>
                        offered by “vertical channel conflict” (between layers of supply chain) in their Supply Chain.
                        Simon has
                        nearly 3 decades of work experience in all aspects of Supply Chain working closely with large
                        corporations
                        all around the globe.<br><br>
                        <i>“Our greatest asset is Teamire’s members/contractors”, he says. “we never place any kind of
                            limit or set
                            boundaries when it comes to seeking knowledge, we will continue to recognise and group those
                            individual
                            talents and reward our clients”</i>.<br><br>
                        Our ability in seeking high quality individuals from all around the globe allow us flexibility
                        to prepare
                        the type of business solution teams and individuals that are most sought by our clients. Since
                        every member
                        of our Group is also a Subject Matter Expert in some area Supply Chain, evaluating and deploying
                        the best
                        solution is transparent, speedy and effective.
                    </p>
                </div>
                <span id="readMore" class="">Read More</span>
            </div>
        </div>

        <hr class="m-b-30 m-t-30" width="100%">

        <div class="row slideanim">
            <div class="col-md-9">
                <h4 id="howWeDoThis">How we do this</h4>
                <div>
                    <p>Often, vertical channel conflict (i.e. between layers of supply chain) occurs due to ambiguous
                        roles and
                        responsibilities.<br><br>
                    </p>
                </div>
                <div id="more1">
                    <p>
                        With a clear definition of roles and responsibilities, our Synchronization process starts
                        by making sure that all supply chain partners are fully aware what tasks they’re expected to
                        perform
                        (e.g. storing goods, modifying, reassemble, price marking), when they’re expected to do them
                        (e.g. lead-times and deadlines).<br><br>
                        How they’re expected to perform (e.g. to what operating specifications) and what results are
                        expected
                        (e.g. sales quota, customer satisfaction ratings).<br><br>
                        For us it’s simple, we collaborate with our clients, evaluate roles & business functions and
                        devise a plan
                        (we call this our blueprint) to get all of our client’s partners (both internal & external)
                        operating in a
                        manner that is mutually supportive (flexible & cooperative) and seamless (smooth & unnoticed by
                        customers).<br><br>
                        Every business wants more productivity from less input, thus for effective Supply Chain tasks
                        and activities
                        require operating synchronization such as entering orders, conforming schedules, tracking
                        shipments,
                        communicating status information, invoicing, collecting payments, processing returns, resolving
                        disputes, etc.<br><br>
                        Teamire understands the level of pain whenever a client’s partner has a process failure, the
                        entire supply
                        chain may be disrupted. These types of process failures among partners can lead to annoying
                        operational
                        conflict resulting in businesses suffering financial losses, allowing for un-announced
                        competition and this is
                        where TEAMIRE can step in to help you find the right solution to your problems.
                    </p>
                </div>
                <span class="" id="readMore1">Read More</span>
            </div>
            <div class="col-md-3">
                <img src="../include/assets/images/aboutus-img2.png" style="width: 100%; border-radius: 50%;">
            </div>
        </div>

        <hr class="m-b-30 m-t-30" width="100%">

        <div class="row slideanim">
            <div class="col-md-3 slideleft">
                <img src="../include/assets/images/aboutus-img3.png" style="width: 100%; border-radius: 50%;">
            </div>
            <div class="col-md-9 slideleft">
                <h4 id="ourVision">Our Vision</h4>
                <div>
                    <p>At Teamire our purpose is to help our client streamline their business processes by synchronizing
                        their Production, Inventory and Sales and relisting them as a reliable and competitive source
                        for
                        products and services. It is also our goal to become our clients 1st choice every time for
                        resolving
                        all Supply Chain related
                    </p>
                </div>
                <div id="more2">
                    <p>
                        process issues when it comes to re-alignment with our client’s key business
                        objectives.
                    </p>
                </div>
                <span id="readMore2" class="">Read More</span>
            </div>
        </div>

        <hr class="m-b-30 m-t-30" width="100%">

        <div class="row slideanim">
            <div class="col-md-9">
                <h4 id="ourObjectives">Our Objectives</h4>
                <div>
                    <p>Is to ensure that we always have a realistic plan in restructuring our client’s strategic
                        business
                        framework from effective collaboration to evaluation of roles and functions, our PMO’s and
                        Project
                        Specialists chart and develop a model that is effective, easy to drive, is sustainable, provides
                        a
                        competitive edge from all aspects to clients but
                    </p>
                </div>
                <div id="more3">
                    <p>
                        most of all is making them money. Our highly skilled
                        Supply Chain Professional are ready to take on all types of challenges from Change Management to
                        the
                        ever so demanding and complex Supply Chain Management.
                    </p>
                </div>
                <span class="" id="readMore3">Read More</span>
            </div>
            <div class="col-md-3">
                <img src="../include/assets/images/aboutus-img4.png" style="width: 100%; border-radius: 50%;">
            </div>
        </div>

        <hr class="m-b-30 m-t-30" width="100%">

        <div class="row slideanim">
            <div class="col-md-3 slideleft">
                <img src="../include/assets/images/aboutus-img5.png" style="width: 100%; border-radius: 50%;">
            </div>
            <div class="col-md-9 slideleft">
                <h4>Our Services</h4>
                <div>
                    <p>Whilst a customized business solution is what we thrive on, TEAMIRE is also engaged in sourcing,
                        Administrative Support Staff, Demand & Forecasting Analysts, Demand Planners, Supply Chain
                        Planners,
                        Logistics and Transport Coordinators, executive and management level roles in Business Change
                        and Transformation,
                    </p>
                </div>
                <div id="more4">
                    <p>
                        Demand Planning, Procurement, Purchasing, Supply Chain, Warehousing & Distribution, Logistics
                        and Freight Management
                        as both office based and remote staff.<br><br>
                        Co-founder and CEO of Teamire Mr. Simon Reddy has more than 27 years of experience in Supply
                        Chain Management.
                        Simon is also actively involved in marketing and taking his young business to new levels since
                        it was established
                        in 2017.<br><br>
                        What separate us from the competition is our ability to find, plan and deploy seasoned and
                        talented Supply Chain
                        subject matter experts on project every time. Many of these refined individuals are experts who
                        miss out simply
                        due to lack of opportunity. Through our internal training programs, we continue to work with our
                        members to further
                        develop their project management skills in producing optimal results for every project. Whilst
                        providing these
                        subject matter experts a platform is expensive the benefit we receive as a result far outweigh
                        the cost associated
                        in preparing them to deliver at the highest level.<br><br>
                        At TEAMIRE we always seek to deploy the best. We do not and shall not discriminate on the basis
                        of race, color,
                        religion (creed), gender, gender expression, age nationality (ancestry), disability, marital
                        status, sexual orientation,
                        or military status in any of its activities or operations.
                    </p>
                </div>
                <span class="" id="readMore4"><a>Read More</a></span>
            </div>
        </div>

        <hr class="m-b-30 m-t-30" width="100%">

    </div>
</div>
