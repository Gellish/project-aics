/*
 var modal = document.getElementById("modal");
 var modalBtn = document.getElementById("modalBtn");
 var closeBtn = document.getElementsByClassName("closeBtn")[0];

 modalBtn.addEventListener("click",openModal);
 closeBtn.addEventListener("click",closeModal);
 window.addEventListener("click",Outsideclick)
 function  openModal() {
 modal.style.display = "block";
 }
 function  closeModal() {
 modal.style.display = "none";
 }
 function  Outsideclick(e) {
 if(e.target == modal){
 modal.style.display = "none";
 }
 }
 */
/*
 var modal = document.querySelector("[type='modal']");
 var modal_open = document.querySelector("#modalopen");
 var modal_close = document.querySelector("#modalclose");

 modal_open.addEventListener("click",openModal);
 modal_close.addEventListener("click",closeModal);
 window.addEventListener("click",Outsideclick);

 function  openModal() {
 modal.style.display = "block";
 }

 function  closeModal() {
 modal.style.display = "none";
 }
 function  Outsideclick(e) {
 if(e.target == modal){
 modal.style.display = "none";
 }
 }
 */
document.addEventListener('click', toggle, false);

function toggle(event) {
    event = event || window.event;
    var target = event.target || event.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle')) {
        if (target.hasAttribute('data-target')) {
            var data_id = target.getAttribute('data-target');
            document.getElementById(data_id).classList.add('open');
            event.preventDefault();
        }
    }
    if (target.classList.contains('modal') || (target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss'))) {
        var modal = document.querySelector('[class="open"]');
        modal.classList.remove('open');
        event.preventDefault();
    }

}