<?php
/* @var $this yii\web\View */
$this->title = 'AFCE Tracker';
?>
<div class="site-index">

    <!-- <div class="jumbotron"> -->

       <!-- <p class="lead">The best solution for you.</p> -->
        <?php echo "<h3><marquee bgcolor='#C7B7B4'>Today is " . date("l ") . date("Y-m-d") .' '."</marquee></h3>" ;?>
        
        <style type="text/css">
#kiri
{
width:50%;
height:100px;
background-color:#91baff;
float:left;
padding-top:15px;
padding-bottom:15px;
padding-right:15px;
padding-left:15px;
}
#kanan
{
width:50%;
height:100px;
background-color:#0C0;
float:right;
}
<style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            height: 40%;
        /*    margin: auto; */
        }
    </style>
    <style>
        .modal-header, h4, .close {
            background-color: #5461d8;
            color:white !important;
            /*text-align: center;*/
            padding-top:9px;
			padding-bottom:9px;
			padding-right:9px;
			padding-left:9px;
            font-size: 17px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
<div id="kiri">
<h1><font color="black" face="Mistral"> AFCE Tracker ~ The best solution for you</font></h1>
<h4><img src="../uploads/ask.png" width="40"><font face="Trebuchet MS"><br><br><i>"Merupakan suatu aplikasi yang dirancang untuk membantu para investor
ataupun pekerja untuk menyelesaikan perencanaan pembangunan projek, 
mulai dari bahan dan keuangan yang dibutuhkan untuk merancang projek tersebut."</i><br><br><br><br></h4>

</div>
</style>
    <div class="row"> 
                <div class="col-lg-6">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                            <div class="item active">
                               <img src="../uploads/1.jpg">
                            </div>  

                            <div class="item">
                                <img src="../uploads/2.jpg">
                            </div>

                            <div class="item">
                                <img src="../uploads/3.jpg">
                            </div>

                            <div class="item">
                                <img src="../uploads/4.jpg">
                            </div>

                            <div class="item">
                                <img src="../uploads/5.jpg">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                </div>
                </div>
       <!-- <img src='../uploads/2.jpg' width="700" > -->

    </div>
