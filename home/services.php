<?php
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}
?>

<div style="position: relative;">
  <img style="position: absolute; top:0; width: 100%;" src="../include/assets/images/our-services-bg.png">
<div class="container-fluid">
  <div class="container-fluid m-t-30">
    <div class="container-80 text-center center-page">
      <h2 class="slideanim">
        Our Supply Chain Services
      </h2>
    </div>
  <div class="row slideanim">
    <div class="col-lg-1"></div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=dem">
        <div class="icons icons-container text-center">
        <img src="../include/assets/images/demandPlanning.png">
          <p class="text-white"><b>Demand Planning</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=sup">
        <div class="icons icons-container text-center">
        <img src="../include/assets/images/supplyPlanning.png">
          <p class="text-white"><b>Supply Planning</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=ord">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/orderFulfilment.png">
          <p class="text-white"><b>Order Fulfillment</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=log">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/logistics.png">
          <p class="text-white"><b>Logistics</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=man">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/manufacturing.png">
          <p class="text-white"><b>Manufacturing</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-1"></div>
  </div>

  <div class="row m-t-20 slideanim">
    <div class="col-lg-1"></div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=tran">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/transportation.png">
          <p class="text-white"><b>Transportation</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=pro">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/procurement.png">
          <p class="text-white"><b>Procurement</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=tra">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/certificate.png">
          <p class="text-white"><b>Training Certification</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=servicesDetail&code=war">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/warehousing.png">
          <p class="text-white"><b>Warehousing</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-2">
      <a href="../home?view=otherServices">
        <div class="icons icons-container text-center">
          <img src="../include/assets/images/others.png">
          <p class="text-white"><b>Others</b></p>
        </div>
      </a>
    </div>
    <div class="col-lg-1"></div>
  </div>

  </div> <!-- container -->
</div>
  <hr class="m-b-30 m-t-30" width="75%">
  <div class="col-md-8 center-page text-center">
  <h3 class="m-b-30 m-t-30 slideanim">More from Teamire</h3>
  </div>
  <div class="clearfix"></div>

  <div class="m-b-30 row">
  <div class="container-80 center-page slideanim row">
  <div class="col-lg-12" style="padding: 0px !important; margin: 0px !important;">
  <div class="col-md-4 " style="background-color: #f7f7f7;">
    <img src="../include/assets/images/aboutus-img.png" style="width: 100%;">
    <div>
    <h3>
      <a href="../home/?view=aboutUs" target="_self">
        About Us
      </a>
    </h3>
    <div class="truncate" style="height: 100px;">
      <p>
        Find out how we can help you with your hiring and job search needs, learn more about us and what we can offer to your needs.

      </p>
    </div>

    <p class="rh-promos-view-block__read-more">
      <a href="../home/?view=aboutUs" target="_self">
                  Read More
              <i class="fa fa-arrow-right"></i></a>
    </p>
  </div>
  </div>
  <div class="col-md-4 " style="background-color: #f7f7f7;">
    <img src="../include/assets/images/projects-img.png" style="width: 100%;">
    <div>
    <h3>
      <a href="../home/?view=projects" target="_self">
        Projects
      </a>
    </h3>
    <div class="truncate" style="height: 100px;">
      <p>
      Look into our featured projects that we offer.
    </p>
  </div>
    <p class="rh-promos-view-block__read-more">
      <a href="../home/?view=projects" target="_self">
                  Read More
              <i class="fa fa-arrow-right"></i></a>
    </p>
  </div>
  </div>
  <div class="col-md-4" style="background-color: #f7f7f7;">
    <img src="../include/assets/images/contactus-img.png" style="width:100%;">
    <div>
    <h3>
      <a href="../home/?view=contactUs" target="_self">
        Contact Us
      </a>
    </h3>
    <div class="truncate" style="height: 100px;">
    <p>
      Message our team regarding your needs and we will attend to it and contact you personally.
    </p>
  </div>
    <p class="rh-promos-view-block__read-more">
      <a href="../home/?view=contactUs" target="_self">
                  Message us
              <i class="fa fa-arrow-right"></i></a>
    </p>
  </div>
  </div>
</div>
</div>
</div>
</div>
