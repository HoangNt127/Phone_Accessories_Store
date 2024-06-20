@extends('layouts.app')
@section('main')

<form action="{{ url('/place-order') }}" method="post">
		@csrf

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
					<!-- responsive-nav -->
					<div id="responsive-nav">
						<!-- NAV -->
						<ul class="main-nav nav navbar-nav">
							<li class="active"><a href="#">TRANG CHỦ</a></li>
							<li><a href="{{ route('products.index') }}" >SẢN PHẨM</a></li>
							<li><a href="{{ route('products.index') }}" data-key="op lung">ỐP LƯNG</a></li>
							<li><a href="{{ route('products.index') }}" data-key="Tai Nghe">TAI NGHE</a></li>
							<li><a href="{{ route('products.index') }}" data-key="sac">DÂY SẠC - CỦ SẠC</a></li>
							<li><a href="{{ route('products.index') }}" data-key="op lung">SẠC DỰ PHÒNG</a></li>
						</ul>
						<!-- /NAV -->
					</div>
					<!-- /responsive-nav -->
				</div>
				
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{route('home')}}">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thông tin đặt hàng</h3>
							</div>
							<div class="form-group">
								<label for="name">Họ và Tên <span class="required">*</span></label>
								<input class="input" type="text" name="name" id="name" placeholder="Nhập Họ và Tên" required>
							</div>

							<div class="form-group">
								<label for="phone_number">Số điện thoại <span class="required">*</span></label>
								<input class="input" type="tel" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" required pattern="[0-9]{10}" title="Vui lòng nhập đúng 10 số điện thoại">
							</div>

							<div class="form-group">
								<label for="address">Địa chỉ <span class="required">*</span></label>
								<input class="input" type="text" name="address" id="address" placeholder="Nhập địa chỉ" required>
							</div>
							
							<div class="order-col">
									<div><strong>Phương thức thanh toán</strong></div>
									<div>
										<select name="payment_method" id="payment_method" class="form-control "  style="width: 650px;"  required>
											<option value="cash">Thanh toán khi nhận hàng</option>
											<option value="card1">Thanh toán bằng ngân hàng quóc tế</option>
											<option value="card2">Thanh toán bằng ngân hàng trong nước</option>
											<option value="card3">Thanh toán bằng ví trả sau</option>
											<option value="card4">Thanh toán bằng thẻ tín dụng</option>
										</select>
									</div>
								</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<div class="section-title">
								<h3 class="title">Thông tin bổ sung</h3>
							</div>
							<textarea class="input" placeholder="Ghi chú về đơn hàng"></textarea>
						</div>
						<!-- /Order notes -->
						
					</div>
					

				<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản Phẩm</strong></div>
								<div><strong>Tổng Cộng</strong></div>
							</div>

							@php $total = 0 @endphp
							@forelse($cart->items as $item)
								<div class="order-products">
									<div class="order-col">
										<div><strong>{{ $item->quantity }}x</strong> {{ $item->product->name }}</div>
										<div>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</div>
									</div>
								</div>
								@php $total += $item->price * $item->quantity @endphp
							@empty
								<div class="order-products">
									<div class="order-col">
										<div>Không có sản phẩm trong giỏ hàng</div>
									</div>
								</div>
							@endforelse

							@if(isset($shippingFee) && $cart->items->isNotEmpty())
								<div class="order-col">
									<div><strong>Phí Vận Chuyển</strong></div>
									<div><strong>{{ number_format($shippingFee, 0, ',', '.') }} VNĐ</strong></div>
								</div>
								
								@php $total += $shippingFee @endphp
								<div class="order-col">
									<div><strong>Tổng Cộng</strong></div>
									<div style="white-space: nowrap;"><strong class="order-total">{{ number_format($total, 0, ',', '.') }} VNĐ</strong></div>
								</div>
							@endif
							

						
						</div>
						


						@if($cart->items->isNotEmpty())
							<button type="submit" class="primary-btn order-submit wide-btn">Đặt Hàng</button>
						@else
							<p>Giỏ hàng của bạn đang trống.</p>
						@endif
					<!-- /Order Details -->




				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</form>		
@endsection
