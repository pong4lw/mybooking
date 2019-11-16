/**
 * Created by Soul Master on 4/10/18.
 */
var fb = {
    init: function(){
        firebase.initializeApp(config);
        fb.database = firebase.database();
        fb.storage = firebase.storage();
    },
    getKey: function (node) {
        return fb.database.ref(node).push().key;
    },
    getNumberKey: function () {
        return Math.floor(Math.random() * Math.floor(1000000));
    },
    getNameByNow: function(){
        var d = new Date();
        var month = d.getMonth() + 1;
        var name = d.getFullYear() + '_' + month + '_' + d.getDate() + '_' + d.getHours() + d.getMinutes() + d.getSeconds() + d.getMilliseconds()
        return name + '.jpg';
    },
    handleDatabase: {
        createDatabase: function(data, node){
            fb.database.ref(node).set(data);
        },
        updateDatabase: function(data, node){
            fb.database.ref(node).update(data);
        },
        deleteDatabase: function(node){
            fb.database.ref(node).remove();
        },
    },
    handleStorage: {
        createStorage: function(base64, storageNode, databaseNode, deleteStorageNode){
            var create = function(resolve){
                deleteStorageNode = deleteStorageNode ? deleteStorageNode : false;
                var node = storageNode.id ? storageNode.node + fb.getNameByNow() : storageNode.node + '/' + fb.getNameByNow();
                fb.storage.ref(node).putString(base64, 'base64').then(function(snapshot) {
                    var response = snapshot.metadata;
                    var data = {'fullPath':response.fullPath};
                    data[storageNode.name] = response.downloadURLs[0];
                        fb.handleDatabase.updateDatabase(data, databaseNode);
                    if (deleteStorageNode){
                        fb.handleStorage.deleteStorage(deleteStorageNode, resolve);
                    }else{
                         resolve('Success!');
                    }
                });
            }
            return {promise: function (resolve){
                create(resolve);
            }};
        },
        deleteStorage: function(deleteStorageNode, resolve){
            fb.storage.ref(deleteStorageNode).delete().then(function() {
                 resolve('Success!');
            }).catch(function(error) {
                console.log(error);
            });
        },
    }
};

var handleData = {
    updateData: function(databaseNode, data, redirectUrl, storageData){
        var redirect = true;
        if (!$.isEmptyObject(storageData)){
            redirect = false;
            storageData.base64 = storageData.base64.replace(/^data:image\/[a-z]+;base64,/, '');
            var response = handleData.promiseHandleData(fb.handleStorage.createStorage(storageData.base64, storageData.storageNode, databaseNode, storageData.fullPath));
            response.then(function(success){
                if (redirectUrl)
                    location.replace(redirectUrl);
            });
        }
        fb.handleDatabase.updateDatabase(data, databaseNode);
        if (redirect && redirectUrl){
            location.replace(redirectUrl);
        }
    },
    createData: function(databaseNode, data, redirectUrl, storageData){
        var redirect = true;
        if (!$.isEmptyObject(storageData)){
            redirect = false;
            storageData.base64 = storageData.base64.replace(/^data:image\/[a-z]+;base64,/, '');
            var response = handleData.promiseHandleData(fb.handleStorage.createStorage(storageData.base64, storageData.storageNode, databaseNode));
            response.then(function(success){
                if (redirectUrl)
                    location.replace(redirectUrl);
            });
        }
        fb.handleDatabase.createDatabase(data, databaseNode);
        if (redirect && redirectUrl)
            location.replace(redirectUrl);
    },
    promiseHandleData: function (callback) {
        var handle = new Promise(function(resolve, reject){
            callback.promise(resolve);
        })
        return handle;
    },
    previewImage: function (action) {
        if (typeof action == 'undefined'){
            var avatar = document.getElementById('image');
            var image = avatar.files;
            var reader = new FileReader();
            if (avatar.files.length > 0){
                reader.onload = function (e) {
                    $('#preview-image').attr('src',  e.target.result);
                }
                reader.readAsDataURL(image[0]);
            };
        }else if (action == 'msgNovel'){
            var img = document.getElementById('imgMessage');
            var imgFile = img.files;
            var reader = new FileReader();
            if (img.files.length > 0){
                reader.onload = function (e) {
                    $('#preview-image-msg').attr('src',  e.target.result);
                }
                reader.readAsDataURL(imgFile[0]);
            };
        }else if (action == 'editMsgNovel'){
            var img = document.getElementById('imgMessageEdit');
            var imgFile = img.files;
            var reader = new FileReader();
            if (img.files.length > 0){
                reader.onload = function (e) {
                    $('.previewEditImage').find('img').attr('src',  e.target.result);
                }
                reader.readAsDataURL(imgFile[0]);
            };
        }
    },
    //  previewImage: function () {
    //     var avatar = document.getElementById('image');
    //     var image = avatar.files;
    //     var reader = new FileReader();
    //     if (avatar.files.length > 0){
    //         reader.onload = function (e) {
    //             console.log(handleData.snapshotResize(e.target.result, 600, 100));
    //             $('#preview-image').attr('src', handleData.snapshotResize(e.target.result, 600, 100));
    //         }
    //         reader.readAsDataURL(image[0]);
    //     }
    // },
    // snapshotResize:function (srcData, width, height) {
    //   var canvas   = document.createElement("canvas"),
    //     context = canvas.getContext('2d'),
    //     image = new Image();


    // canvas.width = canvas.height = 150;

    // image.src = srcData;
    // context.drawImage(image, $imgData.x, $imgData.y, $imgData.width, $imgData.height, 0, 0, canvas.width, canvas.height);
    // return dataUrl = canvas.toDataURL('image/jpeg');
    // }
};

var validator = {
    make: function (elements, rules, messages) {
        validator.elements =  elements ? elements : [];
        validator.rules =  rules ? rules : [];
        validator.messages =  messages ? messages : [];
        if (elements){
            throw '123';
        }
        return this;
    },
    test: function () {
        console.log(123);
    }
};

function loadTableData(paramDataTable, callback) {
    var table = $('#dataTable').DataTable({
        responsive: true,
        ajax: {
            'type'   : 'POST',
            'url' : paramDataTable.url,
            'data' : function( d ) {
                d.node = paramDataTable.node;
                d.ajax = true;
            },
            headers: {
                'X-CSRF-TOKEN': paramDataTable.csrfToken
            },
            "dataSrc": function ( json ) {
                if (json.data){
                    var response = [];
                    var data = json.data;
                    for (var i in data){
                        var template = callback(i, data[i]) != '' ? callback(i, data[i]) : '';
                        if (template != ''){
                            response.push(callback(i, data[i]));
                        }
                    }
                    return response;
                }
                return {};
            }
        },
    });

    return table;
}

function checkUrl(url){
    var expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);
    if (url.match(regex)) {
      return true;
    }
    return false;
}
