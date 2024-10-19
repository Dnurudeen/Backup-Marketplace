@extends('layouts.seller')

@section('title', 'FAQ')


@section('content')
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #fff;">
      <div class="row">
          <div class="col-12">
            <nav class="text-center mb-4 border border-2 border-dark p-3" style="background-color: #fff;">
              <div class="container-fluid">
                <b style="font-size: 20px;">Frequently Asked Questions</b>
              </div>
            </nav>
          </div>
      </div>
      <div class="mt-auto me-auto ms-auto">
          <div class="content-wrapper" style="background-color: #fff;">
            <div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Why should I advertise on Nigerian Mining Marketplace?
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          Our marketplace is the first online hub dedicated Nigerian to mining and plant equipment in Nigeria. It is easy to post an advertisement and with our management tools and dashboard you will be able to have more control and insight into the performance of your ads.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Why should I advertise on Nigerian Mining Marketplace?
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Our marketplace is the first online hub dedicated Nigerian to mining and plant equipment in Nigeria. It is easy to post an advertisement and with our management tools and dashboard you will be able to have more control and insight into the performance of your ads.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you take commission on sales?
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            No. We are solely a marketplace and do not take commissions or a percentage of your sale.
                        </div>
                      </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How do I sign up?
                        </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            A valid email address is all you need to subscribe to the Marketplace,
                            <br><br>
                            1.       Register <br>
                            2.       Enter email <br>
                            3.       Confirm email address with email link <br><br>

                            Your account is ready
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            How do I create an advert?
                          </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            You can create your ad here by clicking on this link (hyperlink to register account page) to register for an account. Once your account is created click the post ad button and provide the equipment details. Once you’re happy with your ad choose whether you want a weekly or monthly subscription and proceed to the payment page. You will receive an email once your ad has been approved.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How do I find equipment?
                          </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Our advance search tools allow you to search by brand, make and region. Click on the relevant tabs to narrow your search.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                How do I contact the seller?
                          </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Our advance search tools allow you toEach post has the seller contact details. You can click on the number and call the seller directly. Remember we do not take any commissions on any transactions. search by brand, make and region. Click on the relevant tabs to narrow your search.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Why isn’t my ad published?
                          </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            The ads are verified through automatic systems - but sometimes a more thorough check is needed.
                            If your ad is published, you will receive a confirmation email with the link to your ad already online.
                            </div>
                        </div>
                      </div>


                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            How do I edit my ads on Marketplace?
                          </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Once you are logged into your Nigerian Mining Marketplace account, you can manage your ads on the "My Ads" page.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            How do I find the products closest to me?
                          </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Each listing indicates the State where the items are located. <br>
                            This allows for location and optimal quantification of logistical costs. Advertisers can also choose to publish in detail the LGA and of where the item (s) is located.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            Is the Marketplace responsible for the proper functioning and integrity of the published products?
                          </button>
                        </h2>
                        <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            No, our marketplace puts seller and buyer in direct contact and acts only as a virtual storefront. <br>
                            We are in no way responsible for the proper functioning and integrity of a published product
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                            Why do I have so many visitors but few direct contacts? How can I increase them?
                          </button>
                        </h2>
                        <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Our market place has thousands of daily visitors. <br>
                            If your ad was recently published, it is also automatically shown in the top search results by category. This increases the number of views but it is possible that other ads that appear below yours will be more interesting to visitors. <br><br>

                            <b>To increase visitor interest in your ads, follow a few simple tips: </b><br>
                            1.       Always try to post an actual photo showing the product you are selling. If possible, do not post ads without photos <br>
                            2.       Indicate precisely: type, quantity and price of the product you are selling. If you are selling scaffolding, don't just write "Excavator" → rather write "Selling excavator brand Y model at NGN X,000 available for sale in Lagos": those who are looking for that very product will be happy to read it <br>
                            3.       Always respond to contact requests. A notification of requests will automatically come to you via email, but... remember to reply ;) <br>
                            4.       In case your ad contains information that does not comply with the portal's guidelines, you will still receive an email with directions for you to possibly edit your ad and make it publishable.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                            What are the advantages of a marketplace dedicated to mining equipment?
                          </button>
                        </h2>
                        <div id="collapseThirteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            There are several reasons why several people use marketplaces dedicated to mining: <br><br>
                            1.       Convenience: classified ad portals provide a platform where people can access a wide range of
                            products and services from the comfort of their homes. <br>
                            2.       Targeted audience: our portal allows sellers to reach a specific target audience for their products and services. <br>
                            3.       Increased visibility: listing items on a classified’s portal increases the visibility of products and services, which can lead to more sales and higher profits. <br>
                            4.       Local listings: many classified ad portals focus on local listings, making it easier for people to buy and sell items with others in their community. <br>
                            5.       Privacy: selling and buying items through classified ad portals can be done anonymously, which can be an attractive feature for some people. Overall, classifieds portals offer a convenient, affordable and accessible platform to buy, sell and exchange goods and services with others.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                            I no longer want to receive some of the notifications I get via e-mail. How do I turn them off?
                          </button>
                        </h2>
                        <div id="collapseFourteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            You can manage receiving email notifications from your restricted area. To change them, open the "My Account" → "Email Notifications" page.
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                            I have a problem and need help. How do I contact Nigerian Mining Marketplace?
                          </button>
                        </h2>
                        <div id="collapseFifteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            Need help? Contact us by email at: support@nigerianmining.com
                            </div>
                        </div>
                      </div>
                  </div>
            </div>
          </div>
      </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
      </div>
    </footer> -->
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>

{{-- <div class="container mt-5">

</div> --}}
@endsection
