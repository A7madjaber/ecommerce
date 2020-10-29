<script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>

<script src="{{asset('admin/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('admin/lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('admin/lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>

<script src="{{asset('admin/lib/highlightjs/highlight.pack.js')}}"></script>
<script src="{{asset('admin/lib/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/lib/datatables-responsive/dataTables.responsive.js')}}"></script>

<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


<script>



    $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true

        });

        // Select2


    });

</script>

<script>
    $(function(){
        'use strict';
        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
    })
</script>


<script src="{{asset('admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('admin/lib/d3/d3.js')}}"></script>
<script src="{{asset('admin/lib/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('admin/lib/chart.js/Chart.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/lib/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/lib/flot-spline/jquery.flot.spline.js')}}"></script>




<script src="{{asset('admin/lib/medium-editor/medium-editor.js')}}"></script>
<script src="{{asset('admin/lib/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('admin/js/starlight.js')}}"></script>


<script>
    $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })
    });
</script>



<script src="{{asset('admin/js/ResizeSensor.js')}}"></script>
<script src="{{asset('admin/js/dashboard.js')}}"></script>




<script>

        @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"

    switch(type) {
        case'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case'warning':
            toastr.warning("{{Session::get('message')}}");
            break;

        case'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

<script>

    $(document).on("click", "#delete", function(e){

        e.preventDefault();
        var model_id =  $(this).attr('model_id');
        var route =  $(this).attr('route');


        swal({

            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {

                if (willDelete) {

                    $.ajax({
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id' :model_id,
                        },
                        url: route,
                        type: "post",
                        dataType: "JSON",
                        success : function(data)
                        {
                            swal({
                                text: data.message,
                                icon: "success",
                                buttons: true,
                            });

                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1200);
                        },
                    })

                } else {
                    swal({
                        title: "Nothing Deleted",
                        text: "Save Data",
                        icon: "info",
                        buttons: true,
                    })
                }
            });
    });
</script>



<script>

    $(document).on("click", "#status", function(e){
        e.preventDefault();
        var model_id =  $(this).attr('model_id');
        var route =  $(this).attr('route');
        $.ajax({
            data: {
                "_token": "{{ csrf_token() }}",
                'id' :model_id,
            },
            url: route,
            type: "post",
            dataType: "JSON",
            success : function(data)
            {
                swal({
                    text: data.message,
                    icon: "success",
                    buttons: true,
                });

                $('#datatable1').load(document.URL +  ' #datatable1');
            },
        })

    });
</script>

