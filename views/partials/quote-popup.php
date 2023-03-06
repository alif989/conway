<!-- Modal -->
<div class="modal fade" id="quote-popup" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close-x" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </button>
        <h4 class="modal-title">Request For a Quote</h4>
      </div>
      <div class="modal-body p-lg-5">
        <div class="row">
          <div class="col d-md-block d-none">
            <p>Here at Myrtle Beach Locksmith, we’re always ready to assist you for your locksmith service.</p>
            <h3 class="mt-4">Follow Us</h3>
            <?php partial("social-link-icons")?>
            <h3>
              CALL NOW 
            </h3>
            <p>	<a title="Call Now"  onclick="return gtag_report_conversion('tel:<?php echo phone(true, false)?>');"  class="size-4 button-link" href="tel:<?php echo phone(true, false)?>"><?php echo phone(true, false)?></a>	<p> 
              
		        
			</p></p>
          </div>
          <div class="col-lg-8">
            <div class="pl-lg-3 pr-lg-3 text-center">
              <form action="<?php echo url('sendmail') ?>" class="theForm">
                <input type="hidden" name="subject" value="Popup Quote Form">
                <input type="hidden" name="page_url" value="<?php echo currentUrl() ?>">
                <div class="form-group">
                  <input type="text" name="name" placeholder="NAME" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" name="email" placeholder="E-MAIL" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="phone" placeholder="PHONE" class="form-control">
                </div>
              
                <div class="form-group">
                  <textarea name="message" rows="5" placeholder="MESSAGE" class="form-control"></textarea>
                </div>
                
                <div class="row form-group">
                  <input type="file" name="file" placeholder="Chose your file" class="form-control border-0">
                  <span class="small-text">(image, doc, pdf, word, etc.)</span>
               </div>
               <div class="form-group text-left">  
                  <button type="submit" class="submitBtn button button_primary base w-50 mt-md-3 pt-3 pb-3 pl-0 highlight-bg">Submit</button>
                </div>

             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>