from faker import Faker
import random

f = Faker()
# wing, aptno, name, contactno, totfamnumber

with open("society-members.sql", "a") as file:
    file.write("""INSERT INTO
    `tblmember` (
        `ID`,
        `Wing`,
        `AptNumber`,
        `Name`,
        `ContactNumber`,
        `TotFamNumber`
    )
VALUES""")

    for wing in ('A', 'B', 'C', 'D', 'E'):
        for i in range(8):
            for j in (1, 2, 3):

                ph_no = "".join(
                    list(map(str, random.sample(range(0, 10), 10))))

                file.write(f"""
                (
                    NULL,
                    '{wing}',
                    '{i+1}0{j}',
                    '{f.name()}',
                    '{ph_no}',
                    '{random.randint(1, 6)}'
                ),
                """)
