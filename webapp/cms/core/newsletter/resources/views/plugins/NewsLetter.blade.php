<h6>Newsletter</h6>
<p>Stay update with our latest</p>
<div>
    <span class="email-message" id="email_msg"></span>
    {!! Form::open(array('url'=>array('add-subscriber'), 'class' => 'form-inline')) !!}
    
        <input
        type="email"
        name="useremail"
        placeholder="YourEmail@email.com"
        class="form-control"
        maxlength="60"
        id="email_data"
        />

        <button
        class="submit-button click-btn btn btn-default"
        type="button"
        id="email_submit"
        >
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </button>
    {!! Form::close() !!}
</div>