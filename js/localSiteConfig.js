var Storage = window.sessionStorage ? sessionStorage : false;

//get URL search params from calling module file - a cool feature called a metaURL
const metaUrl = new URL(import.meta.url); //lower case '.url' is a property
const metaSite = metaUrl.searchParams.get('siteName'); //calling modules do this: import { dataConfig } from '../VAL_Web_Utilities/js/gbifDataConfig.js?siteName=val'
console.log('localSiteConfig called by module with siteName', metaSite);

export const siteConfig = {
    //siteName: 'val'
    //siteName: 'mval'
    //siteName: 'vtButterflies'
    //siteName: 'vtBees'
    //siteName: 'vtMammals'
    //siteName: 'vtFungi'
    //siteName: 'eButterfly'
  }

export function setLocalSite(localSiteName=siteConfig.siteName) {
  if (Storage) {
    Storage.setItem("siteName", JSON.stringify(localSiteName));
    console.log(`localSiteConfig.js: sessionStorage.setItem("siteName", ${localSiteName})`);
  } else {
    console.log('localSiteConfig.js: window.sessionStorage NOT available.')
  }
}

setLocalSite(metaSite ? metaSite : siteConfig.siteName);