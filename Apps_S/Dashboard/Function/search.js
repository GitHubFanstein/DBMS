document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll(".search-input").forEach(inputField => {
        const tablerows = inputField.closest("table").querySelectorAll("tbody tr");
        const headercell = inputField.closest('th');
        const otherheader = inputField.closest("tr").querySelectorAll("th");
        const colomindex = Array.from(otherheader).indexOf(headercell);
        const searchablecells = Array.from(tablerows).map(row => row.querySelectorAll("td")[colomindex]);


        inputField.addEventListener("input", function(){
            const searchquery = inputField.value.toLowerCase();

            for(const tablecell of searchablecells){
                const row = tablecell.closest("tr");
                const value = tablecell.textContent.toLowerCase().replace(",", "");

                row.style.visibility =  null;

                if(value.search(searchquery) === -1){
                    row.style.visibility = "collapse";
                }
            }
        });
        
    });

});