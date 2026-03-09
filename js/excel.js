
    function exportExcel() {scrcpy
        const barisList = document.querySelectorAll(".data .baris"); 
        const tableData = [];

        barisList.forEach(baris => {
            const kolomList = baris.querySelectorAll(".colom");
            const row = [];

            kolomList.forEach(kolom => {
                row.push(kolom.textContent.trim());
            });

            tableData.push(row);
        });
        console.log(tableData);

        const ws = XLSX.utils.aoa_to_sheet(tableData);
        const range = XLSX.utils.decode_range(ws["!ref"]);

        for (let c = range.s.c; c <= range.e.c; c++) {
            const cellAddress = XLSX.utils.encode_cell({ r: 0, c });
            const cell = ws[cellAddress];

            if (cell) {
                cell.s = {
                    font: { bold: true, color: { rgb: "FFFFFF" } },
                    fill: { fgColor: { rgb: "4F81BD" } },
                    alignment: { horizontal: "center" }
                };
            }
        }

        for (let r = 1; r <= range.e.r; r++) {
            const cellAddress = XLSX.utils.encode_cell({ r, c: 2 });
            const cell = ws[cellAddress];

            if (!cell) continue;

            const v = String(cell.v).toLowerCase();

            if (v === "hadir") {
                cell.s = { font: { color: { rgb: "008000" } } };
            } else if (v === "izin") {
                cell.s = { font: { color: { rgb: "0000FF" } } };
            } else if (v === "sakit") {
                cell.s = { font: { color: { rgb: "FFA500" } } };
            } else if (v === "alpha") {
                cell.s = { font: { color: { rgb: "FF0000" } } };
            }
        }


        // Buat worksheet & workbook
        const worksheet = XLSX.utils.aoa_to_sheet(tableData);
        const workbook = XLSX.utils.book_new();

        XLSX.utils.book_append_sheet(workbook, worksheet, "Data Siswa");

        // Download file Excel
        XLSX.writeFile(workbook, "data-siswa.xlsx");
    }