<!-- latest jquery-->
<script src="{{ asset('backend') }}/assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="{{ asset('backend') }}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="{{ asset('backend') }}/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="{{ asset('backend') }}/assets/js/scrollbar/simplebar.js"></script>
<script src="{{ asset('backend') }}/assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('backend') }}/assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{ asset('backend') }}/assets/js/sidebar-menu.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/chartist/chartist.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/knob/knob.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/knob/knob-chart.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{ asset('backend') }}/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{ asset('backend') }}/assets/js/dashboard/default.js"></script>
<script src="{{ asset('backend') }}/assets/js/notify/index.js"></script>
<script src="{{ asset('backend') }}/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{ asset('backend') }}/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{ asset('backend') }}/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{ asset('backend') }}/assets/js/typeahead/handlebars.js"></script>
<script src="{{ asset('backend') }}/assets/js/typeahead/typeahead.bundle.js"></script>
<script src="{{ asset('backend') }}/assets/js/typeahead/typeahead.custom.js"></script>
<script src="{{ asset('backend') }}/assets/js/typeahead-search/handlebars.js"></script>
<script src="{{ asset('backend') }}/assets/js/typeahead-search/typeahead-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('backend') }}/assets/js/script.js"></script>
<script src="{{ asset('backend') }}/assets/js/theme-customizer/customizer.js"></script>
<!-- login js-->

<!-- Toastr-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
    
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }
    @endif
</script>


{{-- sweet alert --}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-1',
                    cancelButton: 'btn btn-danger mr-1'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Əminsən ?',
                text: "Sildikən sonra geri qaytarılamaz",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Bəli, Sil !',
                cancelButtonText: 'Xeyr, Silmə !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Silindi!',
                        'Uğurla Silindi',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Ləğv Edildi!',
                        'Məlumatlar Güvəndədir! ;)',
                        'error'
                    )
                }
            })
        })
    })
</script>





{{-- show image --}}

<script>
    function mainThumbURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
    $(document).ready(function() {
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
        });
    });
</script>