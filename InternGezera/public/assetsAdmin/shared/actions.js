$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    setTimeout(() => {
        $('.show_confirm_two').click(function (event) {
            var id = $(this).data('id');
            var name = $(this).data('name');
            Swal.fire({
                title: `Are you sure you want to delete this record ?`,
                text: "If you delete this, it will be gone forever.",
                icon: 'warning',
                padding: '3em',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then((result) => {
                if (result.isConfirmed) {
                    let temp = `#${name}-${id}`;
                    $.ajax({
                        url: `${name=='searchPackageItem'?'../deleteSearchPackageItem':'delete'}`,
                        type: 'DELETE',
                        data: { id: id }
                        , success: function (res) {
                            if (res == 1) {
                                $(temp).remove();
                                Swal.fire(
                                    'Removed!',
                                    `Record Has Been Removed !`,
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Error : ${res} !`,
                                    'error'
                                )
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
            });
        });
    }, 1000);
    $('.search_package').click(function (event) {
        Swal.fire({
            title: 'Select Order',
            input: 'text',
            inputPlaceholder: 'Insert Name Of search package',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Create !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "./search-packages/create",
                    type: 'POST',
                    data: { name:result.value, ids:seacrhPackageIds }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Created!',
                                `Search Packge Has Been Created !`,
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });
    $('.bulk_confirmation').click(function (event) {
        var name = $(this).data('name');
        var key = $(this).data('key');
        Swal.fire({
            title: `Are you sure you want to ${(key == 'changeStatus' || key == 'changeChecked') ? 'Update' : 'Delete'} this records ?`,
            text: `${(key == 'changeStatus' || key == 'changeChecked') ? '' : "If you delete this, it will be gone forever."}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                if (key == 'changeStatus') {
                    var status = $('#productStatus').val();
                    $.ajax({
                        url: "bulkUpdateProductStatus",
                        type: 'PUT',
                        data: { ids: ids, status: status }
                        , success: function (res) {
                            if (res == -1) {
                                Swal.fire(
                                    'Updated!',
                                    'Records Status Has Been Updated !',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else if (!isNaN(res)) {
                                Swal.fire(
                                    'Error!',
                                    `Record ${res} Not Found !`,
                                    'error'
                                )

                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Error : ${res} !`,
                                    'error'
                                )
                            }
                        }, error: function (resp) {
                            if (ids.length == 0) {
                                Swal.fire(
                                    'Error!',
                                    `You must Check on one Record At least !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Look At Your Console There is An Error !`,
                                    'error'
                                )
                                console.log(resp);
                            }

                        }
                    });
                } else if (key == 'changeChecked') {
                    $.ajax({
                        url: "bulkUpdateProductChecked",
                        type: 'PUT',
                        data: { ids: idsChecked }
                        , success: function (res) {
                            if (res == -1) {
                                Swal.fire(
                                    'Updated!',
                                    'Records Status Has Been Updated !',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else if (!isNaN(res)) {
                                Swal.fire(
                                    'Error!',
                                    `Record ${res} Not Found !`,
                                    'error'
                                )

                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Error : ${res} !`,
                                    'error'
                                )
                            }
                        }, error: function (resp) {
                            if (ids.length == 0) {
                                Swal.fire(
                                    'Error!',
                                    `You must Check on one Record At least !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Look At Your Console There is An Error !`,
                                    'error'
                                )
                                console.log(resp);
                            }

                        }
                    });
                } else {
                    $.ajax({
                        url: "bulkDelete",
                        type: 'DELETE',
                        data: { ids: ids, key: key }
                        , success: function (res) {
                            if (res == -1) {
                                ids.forEach(e => {
                                    $(`#${name}-${e}`).remove();
                                });
                                ids = [];
                                Swal.fire(
                                    'Removed!',
                                    `Records Has Been Removed !`,
                                    'success'
                                )
                            } else if (!isNaN(res)) {
                                Swal.fire(
                                    'Error!',
                                    `Record ${res} Not Found !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `${res} !`,
                                    'error'
                                )
                            }
                        }, error: function (resp) {
                            if (ids.length == 0) {
                                Swal.fire(
                                    'Error!',
                                    `You must Check on one Record At least !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `Look At Your Console There is An Error !`,
                                    'error'
                                )
                                console.log(resp);
                            }
                        }
                    });
                }

            }
        });
    });
    $('button[id^="saveQ-"]').click(function (event) {
        let id = $(this).data('id');
        let type = $(this).data('type');
        Swal.fire({
            title: `Type the quantity you want to ${type == 'add' ? 'add' : 'sub'} ... `,
            input: 'number',
            padding: '3em',
            showCancelButton: true,
            confirmButtonText: 'Save',
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                if (type == 'add') {
                    $.ajax({
                        url: `../${type == 'add' ? "addQuantity" : "subQuantity"}`,
                        type: 'POST',
                        data: { id: id, quantity: result.value }
                        , success: function (res) {
                            if (res == 1) {
                                Swal.fire(
                                    'Changed!',
                                    `Record Quantity Has Been Changed !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else if (!isNaN(res)) {
                                Swal.fire(
                                    'Error!',
                                    `Record ${res} Not Found !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `${res} !`,
                                    'error'
                                )
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
                } else {
                    $.ajax({
                        url: `../${type == 'add' ? "addQuantity" : "subQuantity"}`,
                        type: 'POST',
                        data: { id: id, quantity: result.value }
                        , success: function (res) {
                            if (res == 1) {
                                Swal.fire(
                                    'Changed!',
                                    `Record Quantity Has Been Changed !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else if (!isNaN(res)) {
                                Swal.fire(
                                    'Error!',
                                    `Record ${res} Not Found !`,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    `${res} !`,
                                    'error'
                                )
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
            }

        })
    });
    $('div[id^="editOrderStatus-"]').click(function (event) {
        let type = $(this).attr('id').split('-')[1];
        let key = $(this).data('key');
        Swal.fire({
            title: `Are you sure you want to Update ${type} Status Of this record?`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `../updateShipmentStatus`,
                    type: 'PUT',
                    data: { id: $('#orderId').val(), key: key }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Updated!',
                                `Order ${type} Status Has Been Updated !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });
    $('#editOrderReturnReason').change(function (event) {
        let reason_id = $(this).val();
        Swal.fire({
            title: `Are you sure you want to Update Return Reason Of this record?`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed &&reason_id!=null) {
                $.ajax({
                    url: `../updateReturnReason`,
                    type: 'PUT',
                    data: { order_id: $('#orderId').val(), reason_id: reason_id }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Updated!',
                                `Order Return Reason Has Been Updated !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }else if(res==1){
                            Swal.fire(
                                'Updated!',
                                `Order Return Reason Has Been Created !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }else if(res==2){
                            Swal.fire(
                                'Updated!',
                                `Order Return Reason Has Been Deleted !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });



    showOrderDetailMove()




    $('.show_ReturnDetail_status').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Select Status',
            input: 'select',
            inputPlaceholder: 'select',
            inputOptions: {
                "in_progress": 'In Progress',
                "rejected": 'Rejected',
                "approved": 'Approved',
                "add_to_stock": 'Add To Stock'
            },
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Change !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "../changeDetailStatus",
                    type: 'PUT',
                    data: { id: id, status: result.value }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Changed!',
                                `Detail Status Has Been Changed !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
            } else if (result.isConfirmed = false) {
                Swal.fire(
                    'Error!',
                    `Error : You Should Select A Correct Status Id !`,
                    'error'
                )
            }
        });
    });

    




    showOrderDetailDelete()

    showOrderDetailReturn()



    $('.show_ReturnDetail_returnToOrder').click(function (event) {
        let id = $(this).data('id');
        let returnId = $(this).data('return');
        Swal.fire({
            title: `Are you sure you want to Merge this Detail To Order ?`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Merge !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../returnDetailToOrder",
                    type: 'POST',
                    data: { id: id }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Returned To Order !',
                                `Detail Has Been Returned !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else if (res == 1) {
                            Swal.fire(
                                'Returned To Order !',
                                `Detail Has Been Returned !`,
                                'success'
                            ).then(() => {
                                Swal.fire({
                                    title: `Return Is Empty`,
                                    text: 'Do You Want TO Delete It ?',
                                    icon: 'warning',
                                    padding: '3em',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes !'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "../delete",
                                            type: 'DELETE',
                                            data: { id: returnId }
                                            , success: function (res) {
                                                if (res == 1) {
                                                    Swal.fire(
                                                        'Deleted !',
                                                        `Return Has Been Deleted !`,
                                                        'success'
                                                    ).then(() => {
                                                        location.replace('../index');
                                                    });
                                                } else {
                                                    Swal.fire(
                                                        'Error!',
                                                        `Error : ${res} !`,
                                                        'error'
                                                    )
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
                                    } else {
                                        location.reload();
                                    };
                                });
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });

    $('.apply_coupon').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Enter The Coupon Code',
            input: 'text',
            inputPlaceholder: 'Coupoen Code ...',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Apply !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "../applyCoupon",
                    type: 'POST',
                    data: { id: id, coupon: result.value }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Changed!',
                                `Coupon Has Been Applied !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res}`,
                                'error'
                            )
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
        });
    });

    $('#mergeReturns').click(function (event) {
        let id = $(this).data('id');
        let details = $(this).data('details');
        Swal.fire({
            title: 'Select Return Detail',
            input: 'select',
            inputPlaceholder: 'select',
            inputOptions: details,
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Merge !'
        }).then((result) => {

            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "../mergeReturns",
                    type: 'POST',
                    data: { id: result.value,orderId:id }
                    , success: function (res) {
                        if (res) {
                            Swal.fire(
                                'Merged!',
                                `Return Has Been Merged !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res}`,
                                'error'
                            )
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
            } else if (result.isConfirmed = false) {
                Swal.fire(
                    'Error!',
                    `Error : You Should Select A Correct Detail Id !`,
                    'error'
                )
            }
        });
    });

    setTimeout(() => {
        $('.show_seo_form').click(function (event) {
            let Id = $(this).data('id');
            let name = $(this).data('name');
            let seo = $(this).data('seo');
            let type =$(this).data('type');
            var ckeditorEn;
            var ckeditorAr;
            Swal.fire({
                title: 'Make Seo for ' + name,
                html:
                `<h3 class="text-success">English</h3>`+
                `<input id="meta_title_en" class="swal2-input" placeholder="Meta Title En" value="${seo.meta_title ? seo.meta_title.en : ''}">`+
                `<textarea name="metaDescribtion_en" id="meta_describtion_en" class="swal2-input editor" placeholder="Meta Describtion En">${seo.meta_describtion ? seo.meta_describtion.en : ''}</textarea>`+
                `<textarea id="keywords_en" class="swal2-input" placeholder="enter Keywords En with "," ex:test,test1,test2,etc>${seo.keywords ? seo.keywords.en : ''}</textarea>`+
                `<h3 class="text-success">Arabic</h3>`+
                `<input id="meta_title_ar" class="swal2-input" placeholder="Meta Title Ar" value="${seo.meta_title ? seo.meta_title.ar : ''}">`+
                `<textarea name="metaDescribtion_ar" id="meta_describtion_ar" class="swal2-input editor2" placeholder="Meta Describtion Ar">${seo.meta_describtion ? seo.meta_describtion.ar : ''}</textarea>`+
                `<textarea id="keywords_ar" class="swal2-input" placeholder="enter Keywords Ar with "," ex:test,test1,test2,etc>${seo.keywords ? seo.keywords.ar : ''}</textarea>`,
                preConfirm: () => ({
                    metaTitleEn: $('#meta_title_en').val(),
                    metaTitleAr: $('#meta_title_ar').val(),
                    metaDescribtionEn: ckeditorEn.getData(),
                    metaDescribtionAr: ckeditorAr.getData(),
                    keywordsEn: $('#keywords_en').val(),
                    keywordsAr: $('#keywords_ar').val(),
                }),
                didOpen: () => {
                    ClassicEditor
                    .create( document.querySelector( '.editor' ) )
                    .then( newEditor => {
                        ckeditorEn = newEditor;
                    } )
                    .catch( error => {
                        console.error( error );
                    });
                    ClassicEditor
                    .create( document.querySelector( '.editor2' ) )
                    .then( newEditor => {
                        ckeditorAr = newEditor;
                    } )
                    .catch( error => {
                        console.error( error );
                    });
                },
                padding: '3em',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit !'
            }).then((result) => {
                if (result.isConfirmed && result.value != "" && result.value != null) {
                    $.ajax({
                        url: "/admin/seo/storeOrUpdate",
                        type: 'POST',
                        data: { id: Id, data: result.value ,type: type }
                        , success: function (res) {
                            if (res == 1) {
                                Swal.fire(
                                    'Stored!',
                                    `Seo Has Been Created !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                })
                            }
                            else {
                                Swal.fire(
                                    'Error!',
                                    `Error : ${res} !`,
                                    'error'
                                )
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
                } else if (result.isConfirmed = false) {
                    Swal.fire(
                        'Error!',
                        `Error : There was an error!`,
                        'error'
                    )
                }
            });
        });
    }, 1000);



   

    $('.add_chart_size_to_age').click(function (event) {
        let chartId = $(this).data('chartid');
        let productId = $(this).data('productid');
        let ages = $(this).data('ages');


        let html = `<select  class="bg-dark text-white px-3 py-1 rounded" name="age" id="age">`;
        html += `<option value="">Choose Age</option>`;
        ages.map(ele => {
            html += `<option value="${ele.id}">from: ${ele.age} - to: ${ele.age_to} - ${ele.type.en} - code: ${ele.agecode != null ? ele.agecode.code.code: ''}</option>`;
        })
        html += `</select>`;

        Swal.fire({
            title: 'Select Age',
            html: html,
            preConfirm: () => ({
                age: $('#age').val(),
            }),
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Add !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "/admin/stock/size-charts/addToAge",
                    type: 'POST',
                    data: {
                        chartId : chartId,
                        productId : productId,
                        age_id : result.value.age
                     }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Added!',
                                `Age Was Added To Size Chart !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        }
                        else if (res == 2) {
                            Swal.fire(
                                'info',
                                `Age And Size Chart Already Exists`,
                                'info'
                            )
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res}`,
                                'error'
                            )
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
            } else if (result.isConfirmed = false) {
                Swal.fire(
                    'Error!',
                    `Error : You Should Select A Correct Age !`,
                    'error'
                )
            }
        });
    });



    $('#delete_order_return_merge').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: `Are you sure You Want To delete This Order Return Merge`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/orders/orders/mergeReturnsDelete`,
                    type: 'DELETE',
                    data:{ id : id } 
                    , success: function (res) {
                        if (res == 1) {
                            Swal.fire(
                                'Deleted!',
                                `Order Return Merge Were Deleted !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });



    $('.deleteColorImage').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: `Are you sure You Want To delete This Image`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/stock/products/deleteColorImage/${id}`,
                    type: 'get',
                    success: function (res) {
                        if (res == 1) {
                            Swal.fire(
                                'Deleted!',
                                `Product Color Image Deleted !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });


    


    $('#update-order-form').submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: `/admin/orders/orders/update`,
            type: 'put',
            data:data,
            success: function (res) {
                if (res == 1) {
                    Swal.fire(
                        'Success!',
                        `Order Has Been Updated !`,
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                } else if(res == 2) {
                    Swal.fire(
                        'Error!',
                        `Order Is Not Found !`,
                        'error'
                    )
                } else {
                    Swal.fire(
                        'Error!',
                        `Error : ${res} !`,
                        'error'
                    )
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
    });




    $('#update_order_shipping').click(function (event) {
        let orderId = $(this).data('order_id');
        Swal.fire({
            title: 'Type Amount',
            input: 'text',
            inputPlaceholder: 'Insert Amount Of Shipping Fee',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Update !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "/admin/orders/orders/order/updateShippingFee",
                    type: 'POST',
                    data: { 
                        orderId: orderId,
                        amount : result.value
                        }, 
                        success: function (res) {
                        if (res == 1) {
                            Swal.fire(
                                'Updated!',
                                `Shipping Fee Has Been Updated !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });


    $('.deleteSizeChartAges').click(function (event) {
        let id = $(this).data('sizechartage');
        Swal.fire({
            title: `Are you sure You Want To delete This Size Chart Age`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/stock/sizeChartAge/delete/${id}`,
                    type: 'get',
                    success: function (res) {
                        if (res == 1) {
                            Swal.fire(
                                'Deleted!',
                                `Product Size Chart Age Deleted !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
        });
    });


    $('.change_shipment_status').click(function (event) {
        let shipmentStatuses = [
           "New Order",
           'Checking',
           'Checking Done',
           'Uploading',
           'Packaging',
           'Ready',
           'Shipped Out',
           'Delivered',
           'Returned',
           'Canceled'
        ]

        let html = `<select  class="bg-dark text-white px-3 py-1 rounded" name="shipmentStatus" id="shipmentStatus">`;

        html += `<option value="">Choose Shppment Status</option>`;

        shipmentStatuses.map(ele => {
            html += `<option value="${ele}">${ele}</option>`;
        })

        html += `</select>`;

        Swal.fire({
            title: 'Select Shipment Statuses',
            html: html,
            preConfirm: () => ({
                shipmentStatus: $('#shipmentStatus').val(),
            }),
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Add !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "./updateShipmentStatusMultiple",
                    type: 'put',
                    data: {
                        key: result.value.shipmentStatus,
                        ids:ids,
                     }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Updated !',
                                `Shipment Status Was Updated !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res}`,
                                'error'
                            )
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
            } else if (result.isConfirmed = false) {
                Swal.fire(
                    'Error!',
                    `Error : You Should Select A Correct Shipment Status !`,
                    'error'
                )
            }
        });
    });




    $('.updateSeoButton').on('click',function(){
        let item = $(this).data('item')

        $('input[name="id"]').val(item.id)

        if(item.seo)
        {
            $('input[name="meta_title_en"]').val(item.seo.meta_title.en ? item.seo.meta_title.en : '')
            $('input[name="meta_title_ar"]').val(item.seo.meta_title.ar ? item.seo.meta_title.ar : '')
            
    
            editorEn.setData(item.seo.meta_describtion.en ? item.seo.meta_describtion.en : '')
            editorAr.setData(item.seo.meta_describtion.ar ? item.seo.meta_describtion.ar : '')
    
    
            $('input[name="keywords_en"]').val(item.seo.keywords.en ? item.seo.keywords.en : '')
            $('input[name="keywords_ar"]').val(item.seo.keywords.ar ? item.seo.keywords.ar : '')
        }
    })

})

function setSession(key, value)
{
    $.ajax({
        url: `/setSessionKey`,
        type: 'post',
        data:{
            key:key,
            value:value
        }, error: function (resp) {
            console.log(resp)
        }
    });
}


function checkAllCheckBoxes(checkAllButtonId,checkBoxesClass)
{
    $(`#${checkAllButtonId}`).on('click',function(){
        let cellsCheckState = false
        if(this.checked)
        {
            cellsCheckState = true
        }
        else
        {
            cellsCheckState = false
        }
        $(`tbody .${checkBoxesClass}`).each(function(index,element){
            this.checked = cellsCheckState
            $(this).prop('checked', this.checked).change();
        })
    })
}

function areYouSure(formId,message = "")
{
    message = message == "" ? "Are You Sure" : message;
    $(`#${formId}`).submit(function(e){
        e.preventDefault()
        Swal.fire({
            title: `${message}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit()
            }
        });
    })
}



function showSeoPage() 
{
    setTimeout(() => {
        $('.show_seo_form').click(function (event) {
            let Id = $(this).data('id');
            let name = $(this).data('name');
            let seo = $(this).data('seo');
            let type =$(this).data('type');
            var ckeditorEn;
            var ckeditorAr;
            Swal.fire({
                title: 'Make Seo for ' + name,
                html:
                `<h3 class="text-success">English</h3>`+
                `<input id="meta_title_en" class="swal2-input" placeholder="Meta Title En" value="${seo.meta_title ? seo.meta_title.en : ''}">`+
                `<textarea name="metaDescribtion_en" id="meta_describtion_en" class="swal2-input editor" placeholder="Meta Describtion En">${seo.meta_describtion ? seo.meta_describtion.en : ''}</textarea>`+
                `<textarea id="keywords_en" class="swal2-input" placeholder="enter Keywords En with "," ex:test,test1,test2,etc>${seo.keywords ? seo.keywords.en : ''}</textarea>`+
                `<h3 class="text-success">Arabic</h3>`+
                `<input id="meta_title_ar" class="swal2-input" placeholder="Meta Title Ar" value="${seo.meta_title ? seo.meta_title.ar : ''}">`+
                `<textarea name="metaDescribtion_ar" id="meta_describtion_ar" class="swal2-input editor2" placeholder="Meta Describtion Ar">${seo.meta_describtion ? seo.meta_describtion.ar : ''}</textarea>`+
                `<textarea id="keywords_ar" class="swal2-input" placeholder="enter Keywords Ar with "," ex:test,test1,test2,etc>${seo.keywords ? seo.keywords.ar : ''}</textarea>`,
                preConfirm: () => ({
                    metaTitleEn: $('#meta_title_en').val(),
                    metaTitleAr: $('#meta_title_ar').val(),
                    metaDescribtionEn: ckeditorEn.getData(),
                    metaDescribtionAr: ckeditorAr.getData(),
                    keywordsEn: $('#keywords_en').val(),
                    keywordsAr: $('#keywords_ar').val(),
                }),
                didOpen: () => {
                    ClassicEditor
                    .create( document.querySelector( '.editor' ) )
                    .then( newEditor => {
                        ckeditorEn = newEditor;
                    } )
                    .catch( error => {
                        console.error( error );
                    });
                    ClassicEditor
                    .create( document.querySelector( '.editor2' ) )
                    .then( newEditor => {
                        ckeditorAr = newEditor;
                    } )
                    .catch( error => {
                        console.error( error );
                    });
                },
                padding: '3em',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Submit !'
            }).then((result) => {
                if (result.isConfirmed && result.value != "" && result.value != null) {
                    $.ajax({
                        url: "/admin/seo/storeOrUpdate",
                        type: 'POST',
                        data: { id: Id, data: result.value ,type: type }
                        , success: function (res) {
                            if (res == 1) {
                                Swal.fire(
                                    'Stored!',
                                    `Seo Has Been Created !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                })
                            }
                            else {
                                Swal.fire(
                                    'Error!',
                                    `Error : ${res} !`,
                                    'error'
                                )
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
                } else if (result.isConfirmed = false) {
                    Swal.fire(
                        'Error!',
                        `Error : There was an error!`,
                        'error'
                    )
                }
            });
        });
    }, 1000);
}




function showOrderDetailMove()
{
    $('.show_orderDetail_move').click(function (event) {
        let id = $(this).data('id');
        let oldOrderId = $(this).data('order');
        let orders = $(this).data('orders');
        Swal.fire({
            title: 'Select Order',
            input: 'select',
            inputPlaceholder: 'select',
            inputOptions: orders,
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Move !'
        }).then((result) => {
            if (result.isConfirmed && result.value != "" && result.value != null) {
                $.ajax({
                    url: "../moveDetail",
                    type: 'PUT',
                    data: { id: id, oldOrderId: oldOrderId, orderId: result.value }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Moved!',
                                `Detail Has Been Moved !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        }else if (res == 1) {
                            Swal.fire(
                                'Moved!',
                                `Detail Has Been Moved !`,
                                'success'
                            ).then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    `Coupon Has Been deleted From This Order due to Limit !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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
            } else if (result.isConfirmed = false) {
                Swal.fire(
                    'Error!',
                    `Error : You Should Select A Correct Order Id !`,
                    'error'
                )
            }
        });
    });
}




function showOrderDetailDelete()
{
    $('.show_orderDetail_delete').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: `Are you sure you want to Delete this Detail ?`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../deleteDetail",
                    type: 'POST',
                    data: { id: id }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Deleted!',
                                `Detail Has Been deleted !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else if (res == 1) {
                            Swal.fire(
                                'Deleted!',
                                `Detail Has Been deleted !`,
                                'success'
                            ).then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    `Coupon Has Been deleted From This Order due to Limit !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            });
                        }
                        else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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

        });
    });
}





function showOrderDetailReturn()
{
    $('.show_orderDetail_return').click(function (event) {
        let id = $(this).data('id');
        Swal.fire({
            title: `Are you sure you want to Return this Detail ?`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../returnDetail",
                    type: 'POST',
                    data: { id: id }
                    , success: function (res) {
                        if (res == -1) {
                            Swal.fire(
                                'Returnd!',
                                `Detail Has Been Returnd !`,
                                'success'
                            ).then(() => {
                                location.reload();
                            })
                        } else if (res == 10) {
                            Swal.fire(
                                'Returnd!',
                                `Detail Has Been Returnd !`,
                                'success'
                            ).then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    `Coupon Has Been deleted From This Order due to Limit !`,
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                `Error : ${res} !`,
                                'error'
                            )
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

        });
    });
}