const puppeteer = require('puppeteer')
let argv = [];
process.argv.forEach(function (val, index, array) {
  argv[index] = val;
});
let user = argv[2];
let pass = argv[3];
(async () => {
  const browser = await puppeteer.launch({ headless: false, executablePath: 'C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe' })
  const page = await browser.newPage()
  await page.setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36')
  await page.setViewport({width: 1920, height: 1080});
  await page.goto('https://www.copart.com/login/', { waitUntil: 'networkidle0' })
  await page.type('[data-uname="loginUsernametextbox"]', user)
  await page.type('[data-uname="loginPasswordtextbox"]', pass)
  await page.click('[data-uname="loginSigninmemberbutton"]')
  await page.waitForNavigation()
  await page.goto('https://www.copart.com/lotsWon/')
  await new Promise(resolve => setTimeout(resolve, 5000));
  const selectElem = await page.$("select#noOfDays");
  await selectElem.type('180 - 365 days ago');
  await new Promise(resolve => setTimeout(resolve, 5000));
  await page.click("#exportButton");
  await new Promise(resolve => setTimeout(resolve, 5000));
  browser.close()
})()