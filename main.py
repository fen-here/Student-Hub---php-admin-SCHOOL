board=[]
ist=[]

W="White"
B="Black"

for y in range(1, 9):
    ist.
    for x in range(1, 9):
        if y % 2 == 0:
            if x % 2 == 0:
                print("White", x, y)
                ist.append(W)
            else:
                print("Black", x, y)
                ist.append(B)
        else:
            if x % 2 == 0:
                print("Black", x, y)
                ist.append(B)
            else:
                print("White" , x ,y)
                ist.append(W)
        board.append(ist)
print()
print(board)