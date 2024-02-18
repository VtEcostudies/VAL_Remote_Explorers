var Storage = window.sessionStorage ? sessionStorage : false;

export const siteConfig = {
    //siteName: 'val'
    siteName: 'mval'
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

setLocalSite();