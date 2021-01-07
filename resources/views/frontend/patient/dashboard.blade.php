@extends('layout.app')

@section('title')
Deshboard  
@endsection

@section('content')
<style>
    .banner-reportbox {
    width: 270px;
    float: left;
    background: #fff;
    position: relative;
    margin-top: 25px;
    border: 10px solid #fdc02f;
    padding: 10px 10px 0px;
    height: auto;
    min-height: 300px !important;
    border-radius: 5px;
}
.report-whitebox {
    width: 200px;
    height: 20px;
    margin: 0 auto;
    position: absolute;
    left: 0;
    right: 0;
    top: -20px;
    background: #fff;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
}
.reportwhite-cir {
    width: 16px;
    height: 16px;
    background: #fff;
    border-radius: 100%;
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    top: -38px;
}
.reportbox-fields {
    margin-bottom: 15px;
}

.banner-top {
    background: url(https://www.lalpathlabs.com/images/bannerbg.jpg) top center no-repeat;
    height: 417px;
    background-size: cover;
    margin-bottom: 35px;
}
.container {
    max-width: 1340px;
}
.banner-inner, .homebody-inner {
    width: 1180px;
    margin: 0 auto;
    position: relative;
}
.home_marquee {
    position: absolute;
    right: 0;
    top: 8px;
    width: 71%;
    color: #fff;
    font-size: 15px;
}
.banner-slider {
    width: 820px;
    margin: 40px 0 0 0;
    padding: 0;
    float: right;
    overflow: hidden;
    border: 10px solid #fff;
    height: 348px;
    border-radius: 5px;
}
.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.pro-collection-wrap {
    position: relative;
}
.homebody-inner {
    margin-bottom: 30px;
}
.book-collection-right{
    
    margin-top: 15px;
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.prog-box1, .prog-box2 {
    position: relative;
    box-shadow: 0px 6px 7px 0px rgba(0,0,0,0.2);
    overflow: hidden;
    transition: all .5s ease-in-out;
    border-radius: 10px;
}
.book-collection-right .prog-box {
    position: relative !important;
}
.prog-box2:hover {
    box-shadow: 0px 6px 7px 0px rgba(179,75,77,0.5);
    transition: all .5s ease-in-out;
}
.prog-box2 {
    position: absolute;
    bottom: 0;
}
</style>
<span id="error_pin"></span>
<!-- <h1>patient</h1> -->
<section class="banner-top">
    <div class="banner-inner">
         <div id="MainContent_DivTicker" class="home_marquee">
          <marquee behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
         Important information!! Given the unprecedented situation due to COVID-19/Coronavirus, you may experience delay in service response time (Reports & Call center waiting time) We are working tirelessly to provide safe and quality service.Appreciate your cooperation!! Dr Lal PathLabs. <a href="https://www.lalpathlabs.com/pdf/Q2-FY-21-Concall-Invite.pdf" target="_blank" style="text-decoration:underline;color: #fff;">Q2 FY 21 Concall Invite</a>
          </marquee>
        </div>

        <div class="banner-reportbox">
            <div class="report-whitebox"></div>
            <div class="reportwhite-cir"><span></span></div>
            <h3>Quik Show Your Appointment Status</h3>
            <div class="reportbox-fields">
                <span class="reportbox-fields-txt">Appointment ID</span>
                <input name="AppointmentId" type="text" maxlength="9" id="AppointmentId" placeholder="Enter Appointment ID" class="reportbox-fields-style" >
                
            </div>
            
            <div class="reportbox-fields">
            
                    <input type="submit" name="ctl00$MainContent$btnSubmit" value="check report"  id="MainContent_btnSubmit" class="checkreport">
            </div>
           <center><span id="error_report"></span></center>
        </div>

        <div class="banner-slider">
           
            	<div class="homebanner slick-initialized slick-slider" id="banner" role="toolbar">
                   	
                   
                                      
                              <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 11480px; left: -820px;"><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 820px;">   <a href="https://www.lalpathlabs.com/blog/comprehensive-tumor-profiling-for-precision-medicine/" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/blog/comprehensive-tumor-profiling-for-precision-medicine/" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/154-WebBannerCaris.png" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide20" style="width: 820px;">   <a href="https://www.lalpathlabs.com/onlinebooking/familyoffer?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=familyoffer&amp;vendor=200" target="_blank" tabindex="0">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/onlinebooking/familyoffer?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=familyoffer&amp;vendor=200" target="_blank" tabindex="0"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/157-HP_BNR_LPL_F1-05_NEW.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide21" style="width: 820px;">   <a href="https://www.lalpathlabs.com/onlinebooking/wellnesspackages" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/onlinebooking/wellnesspackages" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/164-DrlalpathAdaptationsSwasthfit820x348-01.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide22" style="width: 820px;">   <a href="https://www.lalpathlabs.com/covid19/antibody-testing/" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/covid19/antibody-testing/" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/159-banner.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide23" style="width: 820px;">   <a href="https://www.lalpathlabs.com/pathology-test/fever--sarscov-covid-panel-z1023?q=Z1023" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/pathology-test/fever--sarscov-covid-panel-z1023?q=Z1023" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/162-feverpanel(Banner)-01-01.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide24" style="width: 820px;">   <a href="https://www.lalpathlabs.com/blog/stomach-health-test-gastro-panel/" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/blog/stomach-health-test-gastro-panel/" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/175-Gastro_Banner-02.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide25" style="width: 820px;">   <a href="https://www.lalpathlabs.com/covid19corp/covidcorptest.aspx" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/covid19corp/covidcorptest.aspx" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/177-DLPL_CovidCorpWebBanner_820x348pxctp-0172(1).jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide26" style="width: 820px;">   <a href="https://www.lalpathlabs.com/covid-19.aspx?utm_source=internal&amp;utm_medium=home_page_banner&amp;utm_campaign=covid-19" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/covid-19.aspx?utm_source=internal&amp;utm_medium=home_page_banner&amp;utm_campaign=covid-19" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/143_1.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide27" style="width: 820px;">   <a href="https://www.lalpathlabs.com/pathology-test/ecg-at-home?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=ecgathome&amp;vendor=250" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/pathology-test/ecg-at-home?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=ecgathome&amp;vendor=250" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/160-ECGatHome.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide28" style="width: 820px;">   <a href="https://www.lalpathlabs.com/book-a-test/?utm_source=internal&amp;utm_medium=home_page_banner&amp;utm_campaign=home_collection" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/book-a-test/?utm_source=internal&amp;utm_medium=home_page_banner&amp;utm_campaign=home_collection" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/135_4.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide29" style="width: 820px;">   <a href="https://www.lalpathlabs.com/swasthfit/home.aspx?utm_source=internal&amp;utm_medium=home_page_banner_swasth&amp;utm_campaign=swasth" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/swasthfit/home.aspx?utm_source=internal&amp;utm_medium=home_page_banner_swasth&amp;utm_campaign=swasth" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/158-4.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide210" style="width: 820px;">   <a href="https://www.linkedin.com/company/lpl-genevolve" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.linkedin.com/company/lpl-genevolve" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/172-anniversary-820x348-01.jpg" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide211" style="width: 820px;">   <a href="https://www.lalpathlabs.com/blog/comprehensive-tumor-profiling-for-precision-medicine/" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/blog/comprehensive-tumor-profiling-for-precision-medicine/" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/154-WebBannerCaris.png" class="scale" alt=""> </a>  </div>       </div><div class="slick-slide slick-cloned" data-slick-index="12" aria-hidden="true" tabindex="-1" style="width: 820px;">   <a href="https://www.lalpathlabs.com/onlinebooking/familyoffer?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=familyoffer&amp;vendor=200" target="_blank" tabindex="-1">  </a><div class="bannerimg"><a href="https://www.lalpathlabs.com/onlinebooking/familyoffer?utm_source=internal&amp;utm_medium=bannerclick&amp;utm_campaign=familyoffer&amp;vendor=200" target="_blank" tabindex="-1"> <img src="https://d2qhgd0topi90o.cloudfront.net/website/uploadcontent/HomeBanners/157-HP_BNR_LPL_F1-05_NEW.jpg" class="scale" alt=""> </a>  </div>       </div></div></div>
                                          
                            
                    	
                        <!--<div>
                            <div class="bannerimg">
                                <img src="images/homeimg02.jpg" class="scale" alt="">                                
                            </div>
                        </div>
                        
                        <div>
                            <div class="bannerimg">
                                <img src="images/homeimg03.jpg" class="scale" alt="">                                
                            </div>
                        </div>-->
             
                    
                <ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation20" id="slick-slide20"><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">1</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation21" id="slick-slide21" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation22" id="slick-slide22" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">3</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation23" id="slick-slide23" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">4</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation24" id="slick-slide24" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">5</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation25" id="slick-slide25" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">6</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation26" id="slick-slide26" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">7</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation27" id="slick-slide27" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">8</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation28" id="slick-slide28" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">9</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation29" id="slick-slide29" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">10</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation210" id="slick-slide210" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">11</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation211" id="slick-slide211" class=""><button type="button" data-role="none" role="button" aria-required="false" tabindex="0">12</button></li></ul></div>
            </div>
    </div>
</section>

<section class="pro-collection-wrap homebody-inner">
    <aside class="book-collection-right">
        <div class="prog-box prog-box2"><a href="{{route('patient.appointList')}}"><img width="350" height="200" src="frontend/image/appoint.jpg" class="scale" alt=""><h3 class="pink">Appointment List</h3></a></div>
        <div class="prog-box prog-box1"><a href="{{route('patient.home.approveList')}}"><img width="350" height="200" src="frontend/image/homeAppoint.jpg" class="scale" ><h3>Home Appointment</h3></a></div>
        <div class="prog-box prog-box2"><a href="{{route('patient.report')}}"><img width="350" height="200" src="frontend/image/Report.jpg" class="scale"><h3>Report List</h3></a></div>
    </aside>
</section>


{{--Book Appointment Modal--}}

{{--Home Collection Modal--}}

@endsection


@section( "additional-scripts" )
<script>
 $(document).ready(function() {
    $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

    $(".left-top").on('click', '#HomeCollection', function () {
        var pin = {{$patient->pin_cord}};
        //alert(pin);

        $.ajax({
				url:"{{ route('pin_available.check') }}",
				method:"POST",
				data:{pin:pin,},
				success:function(result)
				{
					if(result == 'available')
					{
						//$('#error_pin').html('<label class="text-success">Home collection not available in your  address</label>');
						//$('#pin').removeClass('has-error');
                        //alert(pin);
                        $('#HomeCollectionModal').modal("show");
					}
					else
					{
						$('#error_pin').html('<label class="text-danger">Home collection not available in your  address</label>');
						//$('#pin').addClass('has-error');
					}
				}
			});
     });
     
     $('#MainContent_btnSubmit').on('click', function () {
			var Test_id = $('#AppointmentId').val();
			alert(Test_id);
            $.ajax({
				url:"{{ route('Appoint.status') }}",
				method:"get",
				data:{Test_id:Test_id,},
				success:function(result)
				{
					alert(result);
						$('.banner-top .banner-reportbox #error_report').html('<label >'+result+'</label>');
						//$('#pin').addClass('has-error');
				}
			});
			
		});



     $('.modal-body #appointmentfor').change(function(){

        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        //$(".modal-body #test_id").val( data[0] );
        $('#sel_test').find('option').not(':first').remove();
        $.ajax({
        url: 'dep_test/'+id,
        type: 'get',
        success: function(response){

            var len = 0;
        if(response['data'] != null){
        len = response['data'].length;
        }
            
            // alert(response['data'].);
            //alert(len);

            
            if(len > 0){
            // Read data and create <option >
            for(var i=0; i<len; i++){

                var name = response['data'][i].test;
                //alert( name );
                var option = "<option value='"+name+"'>"+name+"</option>"; 

                $("#sel_test").append(option); 
            }
            }
            // else{

            // }

        }
        });
    });

    
});
</script>
@endsection