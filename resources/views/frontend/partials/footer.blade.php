<!-- Modal -->
<div id="myModal" class="modal modal-sm fade" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <style>

                .modalbox.success,
                .modalbox.error {
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                    -webkit-border-radius: 2px;
                    -moz-border-radius: 2px;
                    border-radius: 2px;
                    background: #fff;
                    padding: 25px 25px 15px;
                    text-align: center;
                }

                .modalbox.success.animate .icon,
                .modalbox.error.animate .icon {
                    -webkit-animation: fall-in 0.75s;
                    -moz-animation: fall-in 0.75s;
                    -o-animation: fall-in 0.75s;
                    animation: fall-in 0.75s;
                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                }

                .modalbox.success h1,
                .modalbox.error h1 {
                    font-family: 'Montserrat', sans-serif;
                }

                .modalbox.success p,
                .modalbox.error p {
                    font-family: 'Open Sans', sans-serif;
                }

                .modalbox.success button,
                .modalbox.error button,
                .modalbox.success button:active,
                .modalbox.error button:active,
                .modalbox.success button:focus,
                .modalbox.error button:focus {
                    -webkit-transition: all 0.1s ease-in-out;
                    transition: all 0.1s ease-in-out;
                    -webkit-border-radius: 30px;
                    -moz-border-radius: 30px;
                    border-radius: 30px;
                    margin-top: 15px;
                    width: 80%;
                    background: transparent;
                    color: #4caf50;
                    border-color: #4caf50;
                    outline: none;
                }

                .modalbox.success button:hover,
                .modalbox.error button:hover,
                .modalbox.success button:active:hover,
                .modalbox.error button:active:hover,
                .modalbox.success button:focus:hover,
                .modalbox.error button:focus:hover {
                    color: #fff;
                    background: #4caf50;
                    border-color: transparent;
                }

                .modalbox.success .icon,
                .modalbox.error .icon {
                    position: relative;
                    margin: 0 auto;
                    margin-top: -75px;
                    background: #4caf50;
                    height: 100px;
                    width: 100px;
                    border-radius: 50%;
                }

                .modalbox.success .icon span,
                .modalbox.error .icon span {
                    postion: absolute;
                    font-size: 4em;
                    color: #fff;
                    text-align: center;
                    padding-top: 20px;
                }

                .modalbox.error button,
                .modalbox.error button:active,
                .modalbox.error button:focus {
                    color: #f44336;
                    border-color: #f44336;
                }

                .modalbox.error button:hover,
                .modalbox.error button:active:hover,
                .modalbox.error button:focus:hover {
                    color: #fff;
                    background: #f44336;
                }

                .modalbox.error .icon {
                    background: #f44336;
                }

                .modalbox.error .icon span {
                    padding-top: 25px;
                }

                .center {
                    float: none;
                    margin-left: auto;
                    margin-right: auto;
                    /* stupid browser compat. smh */
                }

                .center .change {
                    clearn: both;
                    display: block;
                    font-size: 10px;
                    color: #ccc;
                    margin-top: 10px;
                }

                @-webkit-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-moz-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-o-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-webkit-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 25%;
                    }
                }

                @-moz-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 25%;
                    }
                }

                @-o-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 25%;
                    }
                }

                @-moz-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-webkit-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-o-keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @keyframes fall-in {
                    0% {
                        -ms-transform: scale(3, 3);
                        -webkit-transform: scale(3, 3);
                        transform: scale(3, 3);
                        opacity: 0;
                    }
                    50% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                        opacity: 1;
                    }
                    60% {
                        -ms-transform: scale(1.1, 1.1);
                        -webkit-transform: scale(1.1, 1.1);
                        transform: scale(1.1, 1.1);
                    }
                    100% {
                        -ms-transform: scale(1, 1);
                        -webkit-transform: scale(1, 1);
                        transform: scale(1, 1);
                    }
                }

                @-moz-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 15%;
                    }
                }

                @-webkit-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 15%;
                    }
                }

                @-o-keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 15%;
                    }
                }

                @keyframes plunge {
                    0% {
                        margin-top: -100%;
                    }
                    100% {
                        margin-top: 15%;
                    }
                }
            </style>
            <div class="container">
                <div class="row">
                    <div class="modalbox col-sm-8 col-md-6 col-lg-5 center animate" id="modal-type">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-3x" id="icon-text"></i>
                        </div>
                        <!--/.icon-->
                        <h1 id="header-text"></h1>
                        <p id="modal-text"></p>
                        <button type="button" class="redo btn">{{ __('labels.ok') }}</button>
                    </div>
                    <!--/.success-->
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>

    </div>
</div>

<div class="modal modal-sm fade" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
     id="confirm-dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-question fa-3x" id="icon-text"></i>
                        </div>
                        <!--/.icon-->
                        <h1 id="header-text">
                            {{ __('labels.sure') }}
                        </h1>
                        <p id="modal-text">{{ __('labels.sure_remove_item') }}</p>
                        <input type="hidden" id="item-to-remove" value=""/>
                        <input type="hidden" id="list-to-remove" value=""/>
                        <button type="button" class="btn redo" id="modal-btn-ok">{{ __('labels.ok') }}</button>
                        <button type="button" class="btn redo" id="modal-btn-cancel">{{ __('labels.cancel') }}</button>
                    </div>
                    <!--/.success-->
                </div>
                <!--/.row-->
            </div>
        </div>
    </div>
</div>

@if(request()->route()->getName() === 'cart')
    <script> var isUpdate = true; </script>
@else
    <script> var isUpdate = false; </script>
@endif

<script src="/js/layout.js"></script>
<script>
	$(document).ready(function () {
		updateCartBadge();
	})

	function addToCart(data) {
		$.ajaxSetup({
			            headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            }
		            });

		showOverLay();
		$.post("{{ route('add-to-cart') }}", data).fail(function (error, statusText, xhr) {

			var status = xhr.status;
			if (error.status === 401) {
				window.location = "http://vmi561267.contaboserver.net/login";
			} else {
				$('#modal-type').addClass('error');
				$("#modal-text").text('{{ __('labels.wrong_message') }}');
				$("#header-text").text('{{ __('labels.failure') }}');
				$('#icon-text').addClass('fa-thumbs-down');
				$("#myModal").modal("show");
			}
		}).done(function (response) {
			$('#modal-type').addClass('success');
			$("#modal-text").text(response.message);
			$("#header-text").text('{{ __('labels.success') }}');
			$('#icon-text').addClass('fa-check');
			$("#myModal").modal("show");
		}).always(function () {
			updateCartBadge(isUpdate, data);
			hideOverLay();
		});
	}

	$('.redo.btn').click(function () {
		$("#myModal").modal("hide");
	})

	function removeFromCart(data) {

	}

	function removeFromCartCallBack(data) {
		$.ajaxSetup({
			            headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            }
		            });
		showOverLay();
		if (data.type === 'wishlist') {
			if (data.id === 'all') {
				$.post('{{ route('empty-wishlist') }}').done(function () {
					window.location.reload();
				});
			} else {
				toggleWishlistItem(null, data.id);
			}
		} else {
			$.post('{{ route("removeFromCart") }}', data).fail(function (error, statusText, xhr) {
				var status = xhr.status;
				if (error.status === 401) {
				window.location = "http://vmi561267.contaboserver.net/login";
				} else {
					$('#modal-type').addClass('error');
					$("#modal-text").text('{{ __('labels.wrong_message') }}');
					$("#header-text").text('{{ __('labels.failure') }}');
					$('#icon-text').addClass('fa-thumbs-down');
				}
			}).done(function (response, statusText, xhr) {
				$('#modal-type').addClass('success');
				$("#header-text").text('{{ __('labels.success') }}');
				$('#icon-text').addClass('fa-check');
				$("#modal-text").text(response.message);
				if (data['id'] === 'all') {
					window.location.reload();
				}
				$('#' + data['id']).hide();
				$("#myModal").modal("show");
				hideOverLay();
				updateCartBadge();
			});
		}
	}

	function updateCartBadge(update = false, data = null) {
		if (update) {
			var isIncrement = data['isIncrement'];
			var itemId = data['id'];
			var itemQuantity = +data['itemQuantity'];
			var price = +$('#price-' + itemId).text();
			var oldTotal = +$('#item-total-' + itemId).text();
			var oldQuantity = +$('#quantity-' + itemId).text();
			if (isIncrement) {
				var quantity = oldQuantity + 1;
				var total = oldTotal + price;
			} else {
				var quantity = oldQuantity - 1;
				var total = oldTotal - price;
			}
			$('#item-total-' + itemId).text(total + '');
			$('#quantity-' + itemId).text(quantity + '');
			console.log('quantity => ', quantity);
			console.log('itemQuantity => ', itemQuantity);
			if (quantity === 1) {
				$('#quantity-' + itemId + '-decrement').attr('disabled', true);
			} else {
				$('#quantity-' + itemId + '-decrement').removeAttr('disabled');
			}

			if (quantity === itemQuantity) {
				$('#quantity-' + itemId + '-increment').attr('disabled', true);
			} else {
				$('#quantity-' + itemId + '-increment').removeAttr('disabled');
			}
		}

		$.get("{{ route('get-cart-total') }}", function (data) {
			$("#cart-total").text(data);
		});
		$.get("{{ route('get-cart-total-quantity') }}", function (data) {
			$("#cart-item-total").text(data);
			if (data > 0) {
				$("#cart-item-total").removeClass('d-none');
				$("#cart-item-total").addClass('d-block');
			} else {
				$("#cart-item-total").removeClass('d-block');
				$("#cart-item-total").addClass('d-none');
			}
		});
	}

	let modalConfirm = function (callback) {
		$(".clear-items").on("click", function () {
			$('#item-to-remove').val('all');
			let type = $(this).data('type');
			$('#list-to-remove').val(type);
			$("#confirm-dialog").modal('show');
		});
		$(".remove-item").on("click", function () {
			let itemId = $(this).data('id');
			$('#item-to-remove').val(itemId);
			let type = $(this).data('type');
			$('#list-to-remove').val(type);
			$("#confirm-dialog").modal('show');
		});

		$("#modal-btn-ok").on("click", function () {
			$("#confirm-dialog").modal('hide');
			removeFromCartCallBack({
				                       id: $('#item-to-remove').val(),
				                       type: $('#list-to-remove').val()
			                       });
		});

		$("#modal-btn-cancel").on("click", function () {
			$("#confirm-dialog").modal('hide');
			hideOverLay();
		});
	};

	modalConfirm(function (confirm) {
		if (confirm) {
			$("#result").html("CONFIRMADO");
		} else {
			$("#result").html("NO CONFIRMADO");
		}
	});

	function toggleWishlistItem(event, itemId) {
		event?.preventDefault();
		$.ajaxSetup({
			            headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            }
		            });
		showOverLay();
		let data = {
			id: itemId
		};
		$.post('{{ route("toggle-wishlist") }}', data).done(function (response, statusText, xhr) {
			$('#modal-type').addClass('success');
			$("#header-text").text('{{ __('labels.success') }}');
			$('#icon-text').addClass('fa-check');
			$("#modal-text").text(response.message);
			if (response.command === 'hide') {
				$('#wishlist_' + itemId).removeClass('fas text-danger').addClass('far text-secondary');
				$('#' + itemId).hide();
			} else {
				$('#wishlist_' + itemId).removeClass('far text-secondary').addClass('fas text-danger');
				$('#' + itemId).hide();
			}
			$("#myModal").modal("show");
			hideOverLay();
		});
	}
</script>
@yield('js')


