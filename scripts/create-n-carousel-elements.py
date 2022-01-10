#!/usr/bin/env python3

NUMBER_OF_DIVS = 25
INCL_SPACES = True


divString = """
<div class="item{}">
  <img class="rounded-img carousel-img" id="carousel-img-{}"  src="images/sample.png" alt="Pic{}">
</div>
"""

if(INCL_SPACES):
	divString = """
        <div class="item{}">
          <img class="rounded-img carousel-img" id="carousel-img-{}"  src="images/sample.png" alt="Pic{}">
        </div>
	"""
else:
	divString = """
<div class="item{}">
  <img class="rounded-img carousel-img" id="carousel-img-{}"  src="images/sample.png" alt="Pic{}">
</div>
"""

activeString = " active"

for divNum in range(NUMBER_OF_DIVS):
	if(divNum == 0):
		print(divString.format(activeString, divNum, divNum), end='')
		continue
	print(divString.format('', divNum, divNum), end='')
