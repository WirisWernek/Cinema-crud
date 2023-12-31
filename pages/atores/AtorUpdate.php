<?php
include_once '../../includes/header.php';
?>

<?php

require "../../database/ConexaoDatabase.php";

$conexao = new Conexao();

$connection = $conexao->Conectar();
$sql = "SELECT id_ator, nome, sobrenome FROM ator where id_ator = :id;";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$dado = $stmt->fetch();
?>


<h1 class="mt-6 mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-gray-700 text-center">Editar atores</h1>
<p class="mb-10 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400 text-center">Aqui você pode editar as informações dos atores</p>

<div class="my-10 mx-auto p-10 border-solid border-2  sm:rounded-md max-w-[80%] ">
	<form method="post" action="../../actions/AtorAction.php">
		<div class="relative z-0 w-full mb-6 group">
			<input maxlength="255" type="text" name="floating_nome" id="floating_nome" class="block py-2.5 px-0 w-full text-sm dark:text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $dado['nome']; ?>" required />
			<label for="floating_nome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome</label>
		</div>
		<div class="relative z-0 w-full mb-6 group">
			<input maxlength="255" type="text" name="floating_sobrenome" id="floating_sobrenome" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-900 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?php echo $dado['sobrenome']; ?>" required />
			<label for="floating_sobrenome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sobrenome</label>
		</div>
		<input type="hidden" name="id" value="<?php echo $dado['id_ator']; ?>">
		<div class="flex gap-5 justify-end ">
			<a href="/pages/atores/AtorList.php" class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Voltar para lista de atores</a>
			<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="btn-editar">Salvar</button>
		</div>
	</form>
</div>

<?php
include_once '../../includes/footer.php';
?>