// $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function setSelectToAdapt(product_id,ProductSizesId,productColorsId)
    {
        $(`#${product_id}`).change(function (event) {
        let id = $(this).val();
            $.ajax({
                url: `../../../product/sizes/${id}`,
                type: 'GET',
                success: function (res) {

                    $(`#${ProductSizesId}`).empty();
                    for(let x in res)
                    {
                        $(`#${ProductSizesId}`).append(`<option value="${x}">${res[x]}</option>`)
                    }
                    setProductColors(product_id,ProductSizesId,productColorsId);

                }, error: function (resp) {
                    Swal.fire(
                        'Error!',
                        `Look At Your Console There is An Error !`,
                        'error'
                    )
                    console.log(resp);
                }
            });
        });



        $(`#${ProductSizesId}`).change(function (event) {
            console.log('here');
            setProductColors(product_id,ProductSizesId,productColorsId);
        });




        
    }


    function setProductColors(product_id,ProductSizesId,productColorsId)
    {
        let myproduct_id = $(`#${product_id}`).val();
        let size_id = $(`#${ProductSizesId}`).val();
        $.ajax({
            url: `../../../size/colors/${myproduct_id}/${size_id}`,
            type: 'GET',
            success: function (res) {
                $(`#${productColorsId}`).empty();
                for(let x in res)
                {
                    $(`#${productColorsId}`).append(`<option value="${x}">${res[x]}</option>`)
                }
            }, error: function (resp) {
                Swal.fire(
                    'Error!',
                    `Look At Your Console There is An Error !`,
                    'error'
                )
                console.log(resp);
            }
        });
    }
    // $('#productId').change(function (event) {
    //     let id = $(this).val();

    //     $.ajax({
    //         url: `../../../product/sizes/${id}`,
    //         type: 'GET',
    //         success: function (res) {

    //             $('#ProductSizes').empty();
    //             for(let x in res)
    //             {
    //                 $('#ProductSizes').append(`<option value="${x}">${res[x]}</option>`)
    //             }
    //             productColors();

    //         }, error: function (resp) {
    //             Swal.fire(
    //                 'Error!',
    //                 `Look At Your Console There is An Error !`,
    //                 'error'
    //             )
    //             console.log(resp);
    //         }
    //     });

    // });

    // $('#ProductSizes').change(function (event) {
    //     console.log('here');
    //     productColors();
    // });

    // function productColors()
    // {
    //     let product_id = $('#productId').val();
    //     let size_id = $("#ProductSizes").val();

    //     $.ajax({
    //         url: `../../../size/colors/${product_id}/${size_id}`,
    //         type: 'GET',
    //         success: function (res) {

    //             $('#productColors').empty();
    //             for(let x in res)
    //             {
    //                 $('#productColors').append(`<option value="${x}">${res[x]}</option>`)
    //             }

    //         }, error: function (resp) {
    //             Swal.fire(
    //                 'Error!',
    //                 `Look At Your Console There is An Error !`,
    //                 'error'
    //             )
    //             console.log(resp);
    //         }
    //     });
    // }



// })

