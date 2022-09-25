function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  };

   // File Upload
    //
    // function ekUpload() {
    //     function Init() {
    //
    //         //console.log("Upload shahab");
    //
    //         var fileSelect = document.getElementById('file-upload'),
    //             fileDrag = document.getElementById('file-drag'),
    //             submitButton = document.getElementById('submit-button');
    //
    //
    //         fileSelect.addEventListener('change', fileSelectHandler, false);
    //
    //         // Is XHR2 available?
    //         var xhr = new XMLHttpRequest();
    //         if (xhr.upload) {
    //             // File Drop
    //             fileDrag.addEventListener('dragover', fileDragHover, false);
    //             fileDrag.addEventListener('dragleave', fileDragHover, false);
    //             fileDrag.addEventListener('drop', fileSelectHandler, false);
    //         }
    //     }
    //
    //     function fileDragHover(e) {
    //         var fileDrag = document.getElementById('file-drag');
    //
    //         e.stopPropagation();
    //         e.preventDefault();
    //
    //         fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
    //     }
    //
    //     function fileSelectHandler(e) {
    //         // Fetch FileList object
    //         console.log(e)
    //         var files = e.target.files || e.dataTransfer.files;
    //
    //         // Cancel event and hover styling
    //         fileDragHover(e);
    //
    //         // Process all File objects
    //         for (var i = 0, f; f = files[i]; i++) {
    //             parseFile(f);
    //             uploadFile(f);
    //         }
    //     }
    //
    //     // Output
    //     function output(msg) {
    //         // Response
    //         var m = document.getElementById('messages');
    //         m.innerHTML = msg;
    //     }
    //
    //     function parseFile(file) {
    //
    //         console.log(file.name);
    //         output(
    //             '<strong>' + encodeURI(file.name) + '</strong>'
    //         );
    //
    //         // var fileType = file.type;
    //         // console.log(fileType);
    //         var imageName = file.name;
    //         console.log(imageName)
    //         var isGood = (/\.(?=ai|cdr|eps|psd|peg|tiff|pdf|png|jpg)/gi).test(imageName);
    //         console.log(isGood)
    //         if (isGood) {
    //             document.getElementById('start').classList.add("hidden");
    //             document.getElementById('response').classList.remove("hidden");
    //             document.getElementById('notimage').classList.add("hidden");
    //             // Thumbnail Preview
    //             document.getElementById('file-image').classList.remove("hidden");
    //             let img_src = (file.type === 'application/postscript') ? 'https://static-00.iconduck.com/assets.00/application-icon-96x89-g6k5z7xr.png' : URL.createObjectURL(file)
    //             document.getElementById('file-image').src = img_src;
    //         } else {
    //             document.getElementById('file-image').classList.add("hidden");
    //             document.getElementById('notimage').classList.remove("hidden");
    //             document.getElementById('start').classList.remove("hidden");
    //             document.getElementById('response').classList.add("hidden");
    //             document.getElementById("file-upload-form").reset();
    //         }
    //     }
    //
    //     function setProgressMaxValue(e) {
    //         var pBar = document.getElementById('file-progress');
    //
    //         if (e.lengthComputable) {
    //             pBar.max = e.total;
    //         }
    //     }
    //
    //     function updateFileProgress(e) {
    //         var pBar = document.getElementById('file-progress');
    //
    //         if (e.lengthComputable) {
    //             pBar.value = e.loaded;
    //         }
    //     }
    //
    //     function uploadFile(file) {
    //
    //         var xhr = new XMLHttpRequest(),
    //             fileInput = document.getElementById('class-roster-file'),
    //             pBar = document.getElementById('file-progress'),
    //             fileSizeLimit = 1024; // In MB
    //         if (xhr.upload) {
    //             // Check if file is less than x MB
    //             if (file.size <= fileSizeLimit * 1024 * 1024) {
    //                 // Progress bar
    //                 pBar.style.display = 'inline';
    //                 xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
    //                 xhr.upload.addEventListener('progress', updateFileProgress, false);
    //
    //                 // File received / failed
    //                 xhr.onreadystatechange = function(e) {
    //                     if (xhr.readyState == 4) {
    //                         // Everything is good!
    //                         // progress.className = (xhr.status == 200 ? "success" : "failure");
    //                         document.location.reload(true);
    //                     }
    //                 };
    //
    //                 // Start upload
    //                 // xhr.open('POST', document.getElementById('file-upload-form').action, true);
    //                 // xhr.setRequestHeader('X-File-Name', file.name);
    //                 // xhr.setRequestHeader('X-File-Size', file.size);
    //                 // xhr.setRequestHeader('Content-Type', 'multipart/form-data');
    //                 // xhr.send(file);
    //             } else {
    //                 output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
    //             }
    //         }
    //     }
    //
    //     // Check for the various File API support.
    //     if (window.File && window.FileList && window.FileReader) {
    //         Init();
    //     } else {
    //         document.getElementById('file-drag').style.display = 'none';
    //     }
    // }
    // ekUpload();

    productScroll();

    function productScroll() {
        let slider = document.getElementById("slider");
        let next = document.getElementsByClassName("pro-next");
        let prev = document.getElementsByClassName("pro-prev");
        let slide = document.getElementById("slide");
        let item = document.getElementById("slide");

        for (let i = 0; i < next.length; i++) {
            //refer elements by class name

            let position = 0; //slider postion

            prev[i].addEventListener("click", function() {
                //click previos button
                if (position > 0) {
                    //avoid slide left beyond the first item
                    position -= 1;
                    translateX(position); //translate items
                }
            });

            next[i].addEventListener("click", function() {
                if (position >= 0 && position < hiddenItems()) {
                    //avoid slide right beyond the last item
                    position += 1;
                    translateX(position); //translate items
                }
            });
        }

        function hiddenItems() {
            //get hidden items
            let items = getCount(item, false);
            let visibleItems = slider.offsetWidth / 210;
            return items - Math.ceil(visibleItems);
        }
    }

    function translateX(position) {
        //translate items
        slide.style.left = position * -180 + "px";
    }

    function getCount(parent, getChildrensChildren) {
        //count no of items
        let relevantChildren = 0;
        let children = parent.childNodes.length;
        for (let i = 0; i < children; i++) {
            if (parent.childNodes[i].nodeType != 3) {
                if (getChildrensChildren)
                    relevantChildren += getCount(parent.childNodes[i], true);
                relevantChildren++;
            }
        }
        return relevantChildren;
    };

//     function myFunction1() {
//         let text = `<div class="slider4 mt-4">
//  <h5 style="font-weight: 800;">Sizes + Quantity:</h5>
//  <div class=" colors ">
//     <ul>
//  <li><p style="background-color:#23839c;"></p></li>
//   <li><h6>VINTAGE HEATHER NAVY</h6></li>
//  </ul>
// </div>
//   <div class="row">
//  <div class="col-md text-center">
//  <label for="name" style="font-size:20px; color:black; font-weight:600;">S</label>
//   <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="input" placeholder="0">
//    </div>
//    <div class="col-md text-center">
//  <label for="text" style="font-size:20px; color:black; font-weight:600;">M</label>
//  <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="number" placeholder="0">
//     </div>
//  <div class="col-md text-center ">
//   <label for="text" style="font-size:20px; color:black; font-weight:600;">L</label>
// <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="number" value="0" placeholder="0">
//  </div>
//    <div class="col-md text-center ">
//  <label for="text" style="font-size:20px; color:black; font-weight:600;">XL</label>
//  <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="number" value="0" placeholder="0">
//  </div>
//  </div>
//  <div class="row">
//    <div class="col-md text-center mt-3">
//   <label for="text" style="font-size:20px; color:black; font-weight:600;">2XL</label>
// <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="number" value="0" placeholder="0">
//  </div>
//  <div class="col-md text-center mt-3">
//  <label for="text" style="font-size:20px; color:black; font-weight:600;">3XL</label>
//  <input style="border-radius: 25px; text-align:center;" type="text" class="form-control" id="number" value="0" placeholder="0">
//  </div>
//   <div class="col-md text-center mt-3">
//   <label for="text" style="font-size:20px; color:black; font-weight:600;">Total</label>
//  <input style="background-color:black; text-align:center; color: white; border-radius: 25px;" type="text" class="form-control" id="number" value="0" placeholder="0">
// </div>
//  </div>
//  </div>`;
//         document.getElementById("showSizes").innerHTML = text;
//     };
