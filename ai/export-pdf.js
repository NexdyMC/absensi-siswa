const puppeteer = require('puppeteer');
const path = require('path');

(async () => {
  const browser = await puppeteer.launch({
    headless: 'new'
  });

  const page = await browser.newPage();

  const filePath = path.resolve(__dirname, 'laporan.html');

  await page.goto('file://' + filePath, {
    waitUntil: 'networkidle0'
  });

  await page.pdf({
    path: 'laporan.pdf',
    format: 'A4',
    printBackground: true
  });

  await browser.close();
  console.log('PDF berhasil dibuat!');
})();
