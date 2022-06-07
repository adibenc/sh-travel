<style>
    .result {
        background-color:#FEC606;
        font-weight:bold
    }
</style>
<section id="company-information" class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <h1>
            Rekomendasi wahana
        </h1>
        <div class="row">
            <div class="col-lg-6">
                <form id="form" action="#">
                    <div class="form-group">
                        <label>Umur</label>
                        <input class="form-control" type="text" name="umur" value="25">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                        </select>
                        <!-- <input class="form-control" type="text" name="status" value="1"> -->
                    </div>
                    <div class="form-group">
                        <label>Rombongan</label>
                        <input class="form-control" type="text" name="rombongan" value="3">
                    </div>
                    <div class="form-group">
                        <label>Hobi</label>
                        <select class="form-control" name="hobi">
                        </select>
                        <!-- <input class="form-control" type="text" name="hobi" value="5"> -->
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Ambil rekomendasi">
                        <input type="button" class="btn btn-danger" value="Reset" onClick="reset()">
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Rekomendasi</label>
                </div>
                <div id="recomList" class="form-group">
                    <button class="btn btn-primary" value="">
                        x
                    </button>
                </div>
                <div class="form-group">
                    <pre>
                        <textarea class="form-control result" name="result" rows="16">
                        </textarea>
                    </pre>
                </div>
                
            </div>
        </div>
    </div>
</section>

@script
<script>
    let routes = {
        predictRecom: gl.baseurl + "home/predictRecom"
    }

    gl = {
        ...gl,
        hobi: [
            {"label":"Bekerja","id":1},
            {"label":"Belajar","id":2},
            {"label":"Belanja","id":3},
            {"label":"Bermain","id":4},
            {"label":"Dakwah","id":5},
            {"label":"Fotografi","id":6},
            {"label":"Jualan","id":7},
            {"label":"Kuliner","id":8},
            {"label":"Main Game","id":9},
            {"label":"Memancing","id":10},
            {"label":"Membaca","id":11},
            {"label":"Menggambar","id":12},
            {"label":"Menjahit","id":13},
            {"label":"Menonton","id":14},
            {"label":"Menulis","id":15},
            {"label":"Merawat Anak","id":16},
            {"label":"Musik","id":17},
            {"label":"Ngopi","id":18},
            {"label":"Olahraga","id":19},
            {"label":"Otomotif","id":20},
            {"label":"Politikus","id":21},
            {"label":"Seni","id":22},
            {"label":"Tidur","id":23},
            {"label":"Traveling","id":24}
        ],
        status: [
            {"label":"Belum nikah","id":1},
            {"label":"Nikah","id":2}
        ]
    }

    function reset(){
        $("[name=umur]").val("")
        $("[name=status]").val("")
        $("[name=rombongan]").val("")
        $("[name=hobi]").val("")
    }

    async function getPred({
        umur, status, rombongan, hobi
    }) {
        let fm = new FormData()
        fm.append("umur", umur)
        fm.append("status", status)
        fm.append("rombongan", rombongan)
        fm.append("hobi", hobi)

        return await ajaxer.post(routes.predictRecom, fm)
    }

    $("#form").on('submit', async function(e){
        e.preventDefault()

        let res = await getPred({
            umur: $("[name=umur]").val(), 
            status: $("[name=status]").val(), 
            rombongan: $("[name=rombongan]").val(), 
            hobi: $("[name=hobi]").val()
        })

        let recoms = ""
        
        if(res){
            $("[name=result]").text( JSON.stringify(res) )
            let fmt = `<button class="btn btn-primary">
                :name
            </button>`
            
            res.data.games.forEach((e)=>{
                if(e){
                    recoms += fmt.replace(":name", e)
                }
            })
            $("#recomList").html(recoms)
        }
    })

    $("[value=Reset]").click(()=>{
        reset()
    })

    setTimeout(()=>{
        $("select[name=hobi]").html(
            renderOpt({arr: gl.hobi, mapping: {
                value: "id",
                label: "label",
            }})
        )

        $("select[name=status]").html(
            renderOpt({arr: gl.status, mapping: {
                value: "id",
                label: "label",
            }})
        )
    }, 200)
</script>
@endscript