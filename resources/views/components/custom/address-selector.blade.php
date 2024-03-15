<div>
    <x-forms.select label="Division" labelKey="name" valueKey="id" onChange="divisionChanged(this.value)" name="division_id" select2 :options="$divisions" :value="$division_id" required />
    <x-forms.select label="District" labelKey="name" valueKey="id" onChange="districtChanged(this.value)" name="district_id" select2 :options="$districts" :value="$district_id" required />
    <x-forms.select label="Upozilla" labelKey="name" valueKey="id" name="upozilla_id" select2 :options="$upozillas" :value="$upozilla_id" required />
</div>

@push('js')
    <script>
        var divisions = JSON.parse(`{!!json_encode($divisions)!!}`);
        var districts = [];
        function divisionChanged(id){
            districts = divisions.find((el)=>el.id==id).districts;
            let html = `<option value="">-- Select District --</option>`;
            for(let district of districts){
                html+=`<option value="`+district.id+`">`+district.name+`</option>`;
            }
            $("#district_id").html(html);
            $("#district_id").select2();
        }
        function districtChanged(id){
            let upozillas = districts.find((el)=>el.id==id).upozillas;
            let html = `<option value="">-- Select District --</option>`;
            for(let upozilla of upozillas){
                html+=`<option value="`+upozilla.id+`">`+upozilla.name+`</option>`;
            }
            $("#upozilla_id").html(html);
            $("#upozilla_id").select2();
        }
    </script>
@endpush