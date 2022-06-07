/**
 * crud class, depend on ajaxer
 *
 * todo: set ajaxer
 *
 */
class CRUD {
    routes = {
        create: "",
        read: "",
        update: "",
        delete: "",
        datatable: "",
    };

    form = null;
    formId = null;
    datatable = null;
    ajaxer = null;

    constructor(form = null) {
        let id = "#form";
        this.form = form ? form : $(id)[0];
        this.formId = id;
    }

    setDatatable(dt) {
        this.datatable = dt;
        return this;
    }

    getDatatable() {
        return this.datatable;
    }

    reloadDatatable() {
        var dt = this.getDatatable();
        if (dt) {
            dt.ajax.reload();
        }
    }

    setCreateForm() {
        $(document).on("click", ".add", function () {
            /** Hide Status Field when add */
            $('select[name="status"]').hide();
            $('label[for="status"]').hide();

            $("#modal").modal("show");
            form.main.reset();
            $("#form").attr("data-id", "");
        });

        return this;
    }

    setCreate(id = null) {
        const ctx = this;
        ajaxer.post(
            this.routes.create,
            new FormData(this.form),
            function (response) {
                if (response.success) {
                    alert("Data disimpan");
                    // window.location.reload()
                    ctx.reloadDatatable();
                    $("#modal").modal("hide");
                } else {
                    alert(response.message);
                }
            }
        );

        return this;
    }

    setUpdate(id = null) {
        const ctx = this;
        var url = ctx.routes.update.replace("idx", id);
        // cl(url)
        ajaxer.post(
            ctx.routes.update.replace("idx", id),
            new FormData(this.form),
            function (response) {
                alert("Data updated");
                // window.location.reload()
                $("#modal").modal("hide");
                ctx.reloadDatatable();
            }
        );

        return this;
    }

    setDelete() {
        const ctx = this;
        $(document).on("click", "#btDelete", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");

            if (!confirm("Yakin hapus?")) {
                return;
            }

            ajaxer.delete(
                ctx.routes.delete.replace("idx", id),
                null,
                function (response) {
                    alert("Data terhapus");
                    // window.location.reload()
                    ctx.reloadDatatable();
                }
            );
        });

        return this;
    }

    setEdit() {
        $(document).on("click", "#btEdit", function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");

            /** Show Status Field when add */
            $('select[name="status"]').show();
            $('label[for="status"]').show();

            ajaxer.get(
                routes.read.replace("idx", id),
                null,
                function (response) {
                    $("#form").attr("data-id", response.data.id);
                    // console.log(response)
                    // console.log($('#form').attr("data-id"))
                    form.main.set(response.data);
                }
            );
        });

        return this;
    }

    setSubmissionEvent() {
        const ctx = this;
        $(document).on("submit", "#form", function (e) {
            e.preventDefault();
            var data = new FormData(this);
            var id = $("#form").attr("data-id");

            if (id) {
                // alert("update")
                ctx.setUpdate(id);
            } else {
                // alert("create")
                ctx.setCreate(id);
            }
        });

        return this;
    }

    setFullEvent() {
        const ctx = this;

        this.setCreateForm().setSubmissionEvent().setDelete().setEdit();
    }
}

class ItemsView{
    items = []
    target = ""
    itemFormat = ""
    mappedItems = []
    mapper = null
    maxItem = 16

    constructor(){
        this.mapper = function(e, fmt){
            return "item"
        }
    }

    getMaxItem() {
        return this.maxItem;
    }

    setMaxItem( maxItem) {
        this.maxItem = maxItem;

        return this
    }

    resetItems(){
        this.items = []
        this.mappedItems = []

        return this
    }

    getMapper() {
        let mapper = this.mapper
        if(typeof mapper != 'function'){
            throw Error("mapper must be function")
        }
        
        return mapper;
    }

    setMapper(mapper) {
        if(typeof mapper != 'function'){
            throw Error("mapper must be function")
        }

        this.mapper = mapper;

        return this
    }

    setItems(items){
        this.items = items

        return this
    }

    setItemsAndBuild(items){
        this.items = items
        this.build()

        return this
    }
    
    /**
     * set joined item to specified selector e
     *  
     * */ 
    async setItemsTo(e, items){
        this.items = items
        let builded = this.build()
        
        await $(e).html("")
        $(e).html(
            this.getJoinedMappedItems()
        )    

        return this
    }

    getItems(){
        return this.items
    }
    
    getJoinedMappedItems(){
        return this.mappedItems.join("")
    }

    build(){
        // this.items
        let ret = ""
        const ctx = this

        this.items.forEach((e, i) => {
            if(i >= ctx.maxItem){
                return
            }

            let el = ctx.getMapper()(e, i)
            // ret += el
            ctx.mappedItems.push(el)
        })

        return ret
    }
}

class ProductItemsView extends ItemsView{
    constructor(){
        super()
        this.mapper = function(e, i){
            let id = e.db ? e.db.id || null : e.id || null

            // return ui.productView({
            return ui.productViewR1({
                name: e.name,
                price: util.currencyFloatFmt(e.price),
                prop: `onclick="act('cart-add', {id: ${id}})"`,
            })
        }
    }
}

class CartItemsView extends ItemsView{
    constructor(){
        super()
        this.mapper = function(e, i){
            let id = e.db ? e.db.id || null : e.id || null

            // return ui.productView({
            return ui.productViewR1({
                name: e.name,
                price: util.currencyFloatFmt(e.price),
                prop: `onclick="act('cart-add', {id: ${id}})"`,
            })
        }
    }
}

/*
sample ProductItemsView

var vprodItem = new ProductItemsView()
let menus = [] // arr of menu
vprodItem.setItemsTo("#box-product", menus || [])

dtMenu.on('search', function (e, setting) {
    let data = dtMenu.rows( { filter : 'applied'} ).data();
    let arrdata = data ? data.toArray() : []
    gl.temp = arrdata
    vprodItem.resetItems().setItemsTo("#box-product", arrdata)
    
    // todos
});
*/

// gui global ui helper
let ui = {
    br: "<br>",
    /*
    sample
    
    ui.button({
        slot: ""
    })
    */
    button: ({slot="", cclass="", props=""}) => {
        return `<button type="button" class="btn btn-primary ${cclass}" ${props}>
        ${slot}
        </button>`
    },
    icons: {
        check: `<i class="fa fa-check"></i>`,
        menuBar: `<i class="fas fa-bars text-right"></i>`
    },
    invItem: (id, name, val) => {
        return `<div class="invoice-detail-item">
                    <div class="invoice-detail-name">${name}</div>
                    <div class="invoice-detail-value" id="${id}">${val}</div>
                </div>`;
    },
    cardSmall: ({
        id,
        name = "",
        content = "",
        cl = "",
        header = "",
        attr = "",
        attrBody = "",
    }) => {
        if (!cl) {
            cl += "card-success";
        }
        let hh = `<div class="card-header">
            ${header}
        </div>`;
        // <h4>${name}</h4>

        if (!header) {
            // hh = "";
            content = `<h6>${name}</h6>` + content;
        }
        // style="background-color:#444455"
        return `<div class="col-12 col-md-6 col-lg-3" id="${id}" ${attr}>
            <div class="card ${cl}">
                ${hh}
                <div class="card-body" ${attrBody}>
                ${content}
                </div>
            </div>
          </div>`;
    },
    reservationCardTable: ({
        category = "Normal",
        img = null,
        timerProp = null,
        reservationName = null,
        reservationGroup = null,
        attrBody = "",
        withCapacity = false,
    }) => {
        img = img || window.location.origin + "/assets/img/roundtable.svg"

        // todo
        let capacity = `<p class="capacity mt-2">Kapasitas : <span>0/5</span></p>`
        let status = `<span class="text-danger">Belum Bayar</span>`

        return `<div ${attrBody}>
        <span class="text-primary">${category}</span>
            <div class="roundtable-container">
                <img src="${img}" alt="">
                <div class="timer">
                    <h6 ${timerProp}>00:00</h6>
                </div>
            </div>
            <h6 class="customer">${reservationName}</h6>
            <h6 class="customer">${reservationGroup}</h6>
            </div>
        `
    },
    cardTable: ({
        id,
        name = "",
        isActive = false,
        content = "",
        cl = "",
        header = "",
        attr = "",
        attrBody = "",
        choosable = true,
        fieldname = "",
        inputprop = ""
    }) => {
        let active = isActive ? "active" : ""

        if (!cl) {
            cl += "card-success";
        }

        if (!header) {
            // hh = "";
            content = `<h6>${name}</h6>` + content;
        }


        let main = `<div class="roundtable ${active}">
            <div class="d-flex justify-content-between align-items-center">
            ${header}
            </div>
            ${content}
        </div>`
        
        main = choosable ? `<label for="" style="width:100%">
            <input class="radio-meja" type="checkbox" name="${fieldname}" ${inputprop}>
            ${main}
        </label>` : main

        // style="background-color:#444455"
        return `<div class="col-md-3" id="${id}" ${attr}>
            ${main}
        </div>`;
    },
    productView({
        name,
        price,
        rating=false,
        img=null,
        prop=null,
        imgAlt=null
    }){
        img = img ? img : "https://img.freepik.com/free-vector/hand-drawn-hot-pot-illustration_52683-53525.jpg"
        imgAlt = imgAlt ? imgAlt : "pic"
        star = `<i class="fas fa-star"></i>`
        let stars = rating ? star : ""
        prop = prop ? prop : ""

        return `<div class="col-3 col-md-6 col-lg-3">
            <div class="product-item pb-3">
                <div class="product-image">
                    <img alt="image" src="${img}" class="img-fluid">
                </div>
                <div class="product-details">
                    <div class="product-name">${name}</div>
                    <div class="product-review">
                        ${stars}
                    </div>
                    <div class="text-muted text-small">${price}</div>
                    <div class="product-cta">
                        <a href="#" class="btn btn-primary" ${prop}>Tambah</a>
                    </div>
                </div>  
            </div>
        </div>`
    },
    productViewR1({
        name,
        price,
        rating=false,
        img=null,
        prop=null,
        imgAlt=null
    }){
        img = img ? img : "https://img.freepik.com/free-vector/hand-drawn-hot-pot-illustration_52683-53525.jpg"
        imgAlt = imgAlt ? imgAlt : "pic"
        star = `<i class="fas fa-star"></i>`
        let stars = rating ? star : ""
        prop = prop ? prop : ""

        return `<div class="col-4 col-md-6 col-lg-4 p-0">
            <div class="product-item p-2">
                <div class="product-image">
                    <img alt="image" src="${img}" class="img-fluid">
                </div>
                <div class="product-details">
                    <div class="title">${name}</div>
                    <div class="price">${price}</div>
                    <div class="product-cta">
                    <a href="#" class="btn btn-primary" ${prop}>Tambah</a>
                    </div>
                </div>
            </div>
        </div>`
    },
    checkBoxPill: ({
        name = "name",
        value = "val",
        label = "label",
        props = "",
    }) => {
        return `<label class="selectgroup-item">
            <input type="checkbox" name="${name}" value="${value}" class="selectgroup-input" ${props}>
            <span class="selectgroup-button">${label}</span>
        </label>`;
    },
    p: (cn = "") => {
        return `<p>${cn}</p>`;
    },
};

// global util helper, test
let util = {
    makeClock(fn = null) {
        let dt = new Date();
        fn = fn || function (dt) {};

        return {
            dt: dt,
            intervalIns: setInterval(() => {
                dt = new Date();
                fn(dt);
            }, 1000),
        };
    },
    // ty https://www.w3schools com/howto/howto_js_countdown.asp
    // create countdown
    createTimeCounter({fromDatetime, toDatetime, useAbs = false, callback = null}) {
        // Set the date we're counting down to
        var countDownDate = new Date(toDatetime).getTime();

        if (callback == null) {
            callback = function(datetimeLeft) {

            }
        }
        // Update the count down every 1 second
        // var now = new Date(fromDatetime).getTime();
        var counter = 0;
        var x = setInterval(function() {

            // Get today's date and time
            var now = null;
            
            if(counter==0){
                now = new Date(fromDatetime).getTime();
            }else{
                var temp = new Date(fromDatetime).getTime();
                now = new Date((counter*1000)).getTime();
                now += temp
            }

            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            distance = useAbs ? Math.abs(distance) : distance;
            var sixtyk = 1000*60

            // Time calculations for days, hours, minutes and seconds
            var datetimeLeft = {
                raw: distance,
                days: Math.floor(distance / (sixtyk * 60 * 24)),
                hours: Math.floor((distance % (sixtyk * 60 * 24)) / (sixtyk * 60)),
                minutes: Math.floor((distance % (sixtyk * 60)) / (sixtyk)),
                seconds: Math.floor((distance % (sixtyk)) / 1000),
                isExpired: false
            };

            callback(datetimeLeft)
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);

                datetimeLeft.isExpired = true;
                callback(datetimeLeft)
                // document.getElementById("demo").innerHTML = "EXPIRED";
            }
            counter++;
        }, 1000);

        return x;
    },
    createCtdown(fromDatetime, toDatetime, callback = null) {
        return util.createTimeCounter({
            fromDatetime: fromDatetime, 
            toDatetime: toDatetime, 
            useAbs: false, 
            callback})
    },
    DatetimeLeftParser(DatetimeLeftObj) {
        return {
            formatted(n = 1) {
                var dtlo = DatetimeLeftObj
                var ret = ""
                if(!dtlo.isExpired){
                    switch (n) {
                        case "s":
                            let pads = (e) => e.toString().padStart(2,"0")

                            ret = `${pads(dtlo.hours)}:${pads(dtlo.minutes)}:${pads(dtlo.seconds)}`;
                        break;
                        case "md":
                            ret = dtlo.minutes + " menit " + dtlo.seconds + " detik";
                        break;
                        default:
                            ret = dtlo.days + " Hari " + dtlo.hours + " jam " +
                                dtlo.minutes + " menit " + dtlo.seconds + " detik";
                    }
                }else{
                    ret = "Expired";
                }
                return ret;
            }
        };
    },
    moDBDate(dt) {
        // get date like 2022-02-21 09:42:41
        // cl(dt);
        // wrong
        // return moment(dt).format("Y-MM-DD HH:MM:SS"); 
        return moment(dt).format("Y-MM-DD HH:mm:ss");
    },
    getNow(){
        return util.moDBDate(new Date())
    },
    toDatetimeLocale(dt) {
        if (!(dt instanceof Date)) {
            dt = new Date(dt);
        }
        return dt.toLocaleDateString() + " " + dt.toLocaleTimeString();
    },
    dmyhm(date) {
        var month = date.getMonth() + 1;
        var day = date.getDate();
        var year = date.getFullYear();
        var hm = date.getHours() + ":" + date.getMinutes();

        return day + "/" + month + "/" + year + " " + hm;
    },
    absInt(num) {
        return Math.abs(parseInt(num))
    },
    floatId(num) {
        return parseFloat(num).toLocaleString("id-ID");
    },
    currencyFloatFmt(num, fmt = "id") {
        return util.currencyFmt(util.floatId(num), fmt);
    },
    currencyFmt(num, fmt = "id") {
        switch (fmt) {
            case "id":
            default:
                return `Rp${num},00`;
                break;
        }
        // Rp1.000,00
        /*
        util.arrToSelect2([{id:1, name:"abc"},{ id:3, name:"xab"}], (e,i)=>{
            return {id: e.id, text: e.name}
        })
         */
    },
    arrToSelect2(arr = [], func = null) {
        func =
            func ||
            function (e, i) {
                return e;
            };

        let ret = [];

        arr.forEach((e, i) => {
            ret.push(func(e, i));
        });

        return ret;
    },
};

function GetFormattedDate() {
    var todayTime = new Date();
    return month + "/" + day + "/" + year;
}
/*
sample

renderOpt([{
    id: 1,
    name: "name"
},{
    id: 2,
    name: "name 2"
}], {
    value: "id",
    label: "name",
})

*/
function renderOpt({arr, mapping = {}, initVal = "Pilih"}) {
    let usingArr = mapping === "arr";
    if (!mapping) {
        mapping = {
            value: "x",
            label: "x",
        };
    }

    let ret = `<option value="">${initVal}</option>`;
    let t = `<option value="[v]">[label]</option>`;
    arr.forEach((e) => {
        if (usingArr) {
            ret += t.replace("[v]", e).replace("[label]", e);
        } else {
            ret += t
                .replace("[v]", e[mapping.value])
                .replace("[label]", e[mapping.label]);
        }
    });
    return ret;
}

function generalCRUD(crud) {
    if (!crud) {
        crud = new CRUD();
    }
    crud.setFullEvent();

    return crud;
}

function initCRUD(crud = null) {
    if (!crud) {
        crud = new CRUD();
    }
    crud.routes = routes;
    crud.setDatatable(dt);
    let c = generalCRUD(crud);

    return c;
}

const cl = console.log;
