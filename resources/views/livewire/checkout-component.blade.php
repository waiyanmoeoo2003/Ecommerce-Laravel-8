<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>CheckOut</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
			<form action="" wire:submit.prevent="placeOrder">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Billing Address</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">first name<span>*</span></label>
									<input  type="text" name="fname" wire:model="firstname" value="" placeholder="Your name">
									@error('firstname') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">last name<span>*</span></label>
									<input  type="text" name="lname" wire:model="lastname" value="" placeholder="Your last name">
									@error('lastname') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Addreess:</label>
									<input  type="email" name="email" wire:model="email" value="" placeholder="Type your email">
									@error('email') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Phone number<span>*</span></label>
									<input  type="number" name="phone" wire:model="mobile" value="" placeholder="10 digits format">
									@error('mobile') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line 1</label>
									<input  type="text" name="add" wire:model="line1" value="" placeholder="Street at apartment number">
									@error('line1') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line 2</label>
									<input  type="text" name="add" wire:model="line2" value="" placeholder="Street at apartment number">
									@error('line2') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Country<span>*</span></label>
									<input  type="text" name="country" wire:model="country" value="" placeholder="United States">
									@error('country') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Province<span>*</span></label>
									<input  type="text" name="country" wire:model="province" value="" placeholder="United States">
									@error('province') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">Postcode / ZIP:</label>
									<input type="number" name="zip-code" wire:model="zipcode" value="" placeholder="Your postal code">
									@error('zipcode') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">Town / City<span>*</span></label>
									<input  type="text" name="city" wire:model="city" value="" placeholder="City name">
									@error('city') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form fill-wife">
									<label class="checkbox-field">
										<input name="different-add" value="forever" type="checkbox" wire:model="ship_to_different">
										<span>Ship to a different address?</span>
									</label>
								</p>
							</div>
						</div>	
					</div>
				@if($ship_to_different)
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Shipping Address</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">first name<span>*</span></label>
									<input  type="text" name="fname" wire:model="s_firstname" value="" placeholder="Your name">
									@error('s_firstname') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="lname">last name<span>*</span></label>
									<input  type="text" name="lname" wire:model="s_lastname" value="" placeholder="Your last name">
									@error('s_lastname') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Addreess:</label>
									<input  type="email" name="email" wire:model="s_email" value="" placeholder="Type your email">
									@error('s_email') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Phone number<span>*</span></label>
									<input  type="number" name="phone" wire:model="s_mobile" value="" placeholder="10 digits format">
									@error('s_mobile') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line 1</label>
									<input  type="text" name="add" wire:model="s_line1" value="" placeholder="Street at apartment number">
									@error('s_line1') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="add">Line 2</label>
									<input  type="text" name="add" wire:model="s_line2" value="" placeholder="Street at apartment number">
									@error('s_line2') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Country<span>*</span></label>
									<input  type="text" name="country" wire:model="s_country" value="" placeholder="United States">
									@error('s_country') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="country">Province<span>*</span></label>
									<input  type="text" name="country" wire:model="s_province" value="" placeholder="United States">
									@error('s_province') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">Postcode / ZIP:</label>
									<input type="number" name="zip-code" wire:model="s_zipcode" value="" placeholder="Your postal code">
									@error('s_zipcode') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								<p class="row-in-form">
									<label for="city">Town / City<span>*</span></label>
									<input  type="text" name="city" wire:model="s_city" value="" placeholder="City name">
									@error('s_city') <p class="text-danger">{{$message}}</p> @enderror
								</p>
								
							</div>
						</div>	
					</div>
				@endif
				</div>
			
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						@if($paymentmode=='card')
						<div class="wrap-address-billing">
							@if(Session::has('stripe_error'))
								<div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
							@endif
							<p class="row-in-form">
								<label for="city">Card Number:</label>
								<input  type="text" name="card-no" wire:model="    " value="" placeholder="Card number">
								@error('card_no') <p class="text-danger">{{$message}}</p> @enderror
							</p>
							<p class="row-in-form">
								<label for="city">Expiry Month::</label>
								<input  type="text" name="expire-month" wire:model="exp_month" value="" placeholder="MM">
								@error('exp_month') <p class="text-danger">{{$message}}</p> @enderror
							</p>
							<p class="row-in-form">
								<label for="city">Expiry Year:</label>
								<input  type="text" name="expire-year" wire:model="exp_year" value="" placeholder="YYYY">
								@error('exp_year') <p class="text-danger">{{$message}}</p> @enderror
							</p>
							<p class="row-in-form">
								<label for="city">CVC:</label>
								<input  type="password" name="CVC" wire:model="cvc" value="" placeholder="CVC">
								@error('cvc') <p class="text-danger">{{$message}}</p> @enderror
							</p>
						</div>
						@endif
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
								<span>Cash On Delivery</span>
								<span class="payment-desc">Order Now Pay on Delivery</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
								<span>Debit / Credit Card</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio"wire:model="paymentmode">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
							@error('paymentmode') <p class="text-danger">{{$message}}</p> @enderror
						</div>
						@if(Session::get('checkout'))
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
						@endif
						<button type="submit" class="btn btn-medium">Place Order Now</button>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $0.00</span></p>
					</div>
				</div>

				</form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>