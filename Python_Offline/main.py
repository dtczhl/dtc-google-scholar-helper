from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.keys import Keys
import time
import re

""" ------ Configurations ------ """

# url to your Google Scholar
google_scholar_url = "https://scholar.google.com/citations?user=Xm4NYnsAAAAJ&hl=en&oi=ao"

# ChromeDriver path
chrome_driver_path = "./chromedriver"

""" --- End of Configurations ---"""

show_more_button_text_indicator = "//button[@id='gsc_bpf_more']"
loaded_indicator = "//div[@id='gs_ftr_rt']"
citation_statistics_indicator = "//td[@class='gsc_rsb_std']"
title_indicator = "//a[@class='gsc_a_at']"
citation_indicator = "//a[@class='gsc_a_ac gs_ibl']"

# Wait 20 seconds for page to load
timeout = 20
# Wait for Show More Button information
timeout_more = 5

option = webdriver.ChromeOptions()
option.add_argument(" - incognito")

browser = webdriver.Chrome(chrome_driver_path, options=option)
browser.get(google_scholar_url)

try:
    WebDriverWait(browser, timeout).until(EC.visibility_of_element_located((By.XPATH, loaded_indicator)))
except TimeoutException:
    print("Time out waiting for page to load")
    browser.quit()

show_more_button = browser.find_elements_by_xpath(show_more_button_text_indicator)
show_more_button[0].click()

# wait more content to load
time.sleep(timeout_more)

# find statistics, e.g, h-index
citation_statistics_elements = browser.find_elements_by_xpath(citation_statistics_indicator)
citation_statistics = [x.text for x in citation_statistics_elements]

# find titles
title_elements = browser.find_elements_by_xpath(title_indicator)
# find citations
citation_elements = browser.find_elements_by_xpath(citation_indicator)
titles = [re.sub(r"\W+", "", x.text, flags=re.UNICODE).lower() for x in title_elements]
citations = [x.text if len(x.text) >= 1 else 0 for x in citation_elements]

# format output
file_output_string = "".join([x+"\n" for x in citation_statistics])
file_output_string = file_output_string + "".join(x + "\n" + str(y) + "\n" for x, y in zip(titles, citations))
file_output_string = file_output_string.strip()
print(file_output_string)
print("Total articles = ", len(titles))

with open("google_scholar_citation.txt", "w") as f_out:
    f_out.write(file_output_string)
